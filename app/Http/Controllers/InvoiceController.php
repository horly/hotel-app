<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Encaissement;
use App\Models\Invoice;
use App\Models\ItemRoomInvoice;
use App\Models\ItemServiceInvoice;
use App\Models\Service;
use App\Models\ServiceAssignReservation;
use App\Repository\GenerateRefenceNumber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    //
    protected $request;
    protected $generateReferenceNumber;

    function __construct(Request $request, GenerateRefenceNumber $generateReferenceNumber)
    {
        $this->request = $request;
        $this->generateReferenceNumber = $generateReferenceNumber;
    }

    public function invoices()
    {
        $deviseGest = DB::table('devise_gestions')
            ->join('devises', 'devise_gestions.id_devise', '=', 'devises.id')
            ->where([
                'devise_gestions.default_cur_manage' => 1,
        ])->first();

        $invoices = Invoice::orderBy('id', 'desc')->get();

        return view('app.invoices.invoices', compact(
            'deviseGest',
            'invoices'
        ));
    }

    public function setup_invoice($id_booking)
    {
        $ref_invoice = "INV". date('Y') . date('m') . date('d') . date('H') . date('i') . date('s') . $id_booking . Auth::user()->id;

        //$services = Service::all();

        return redirect()->route('app_add_invoice', ['id_booking' => $id_booking, 'ref_invoice' => $ref_invoice]);

    }

    public function add_invoice($id_booking, $ref_invoice)
    {
        $booking = Booking::where('id', $id_booking)->first();

        $deviseGest = DB::table('devise_gestions')
            ->join('devises', 'devise_gestions.id_devise', '=', 'devises.id')
            ->where([
                'devise_gestions.default_cur_manage' => 1,
        ])->first();

        $arrival_date_booking = date('Y-m-d', strtotime($booking->arrival_date));
        $departure_date_booking = date('Y-m-d', strtotime($booking->departure_date));

        $date1 = Carbon::parse($arrival_date_booking);
        $date2 = Carbon::parse($departure_date_booking);

        $number_of_day = $date1->diffInDays($date2);
        $price_per_night = $booking->room->category->price;
        $total_price = $number_of_day * $price_per_night;

        $service_assigns = ServiceAssignReservation::where('ref_reservation_assgn', $booking->reference_reservation)->get();

        $total_service_assigns = DB::table('services')
                                ->join('service_assign_reservations', 'service_assign_reservations.id_service', '=', 'services.id')
                                ->where('service_assign_reservations.ref_reservation_assgn', $booking->reference_reservation)
                                ->sum('services.price');

        $paymentMethods = DB::table('devises')
                                ->join('devise_gestions', 'devise_gestions.id_devise', '=', 'devises.id')
                                ->join('payment_methods', 'payment_methods.id_currency', '=', 'devise_gestions.id')
                                ->where([
                                    'devises.iso_code' => $deviseGest->iso_code,
                                ])->get();

        $total_services_included = $total_price + ($total_service_assigns * $number_of_day);

        $paymentReceived = DB::table('encaissements')
                            ->where([
                                'reference_enc' => $ref_invoice,
                            ])->sum('amount');


        $remainingBalance = $total_services_included - $paymentReceived;


        $encaissements = DB::table('devises')
                ->join('devise_gestions', 'devise_gestions.id_devise', '=', 'devises.id')
                ->join('payment_methods', 'payment_methods.id_currency', '=', 'devise_gestions.id')
                ->join('encaissements', 'encaissements.id_pay_meth', '=', 'payment_methods.id')
                ->where([
                    'encaissements.reference_enc' => $ref_invoice,
                ])->get();

        $invoice = Invoice::where('reference', $ref_invoice)->first();

        $item_room_invoice = null;
        $item_service_invoices = null;
        $total_service_item = 0.00;

        if($invoice)
        {
            $item_room_invoice = ItemRoomInvoice::where('id_invoice', $invoice->id)->first();
            $item_service_invoices = ItemServiceInvoice::where('id_invoice', $invoice->id)->get();

            $total_service_item = ItemServiceInvoice::where('id_invoice', $invoice->id)->sum('price');
        }

        return view('app.invoices.add_invoice', compact(
            'ref_invoice',
            'booking',
            'number_of_day',
            'deviseGest',
            'total_price',
            'service_assigns',
            'total_service_assigns',
            'paymentMethods',
            'total_services_included',
            'paymentReceived',
            'remainingBalance',
            'encaissements',
            'invoice',
            'item_room_invoice',
            'item_service_invoices',
            'total_service_item'
        ));
    }

    public function checkRecordsAmountInvoice()
    {
        $ref_invoice = $this->request->input('ref_invoice');
        $amount = $this->request->input('amount');
        $total_service_included = $this->request->input('total_service_included');

        $remainingBalance = 0;
        $result = "";

        //$invoice = DB::table('sales_invoices')->where('reference_sales_invoice', $ref_invoice)->first();

        $paymentReceived = DB::table('encaissements')
                            ->where([
                                'reference_enc' => $ref_invoice,
                            ])->sum('amount');

        $remainingBalance = $total_service_included - $paymentReceived;

        if($amount <= $remainingBalance)
        {
            $result = "success";
        }
        else
        {
            $result = "danger";
        }


        return response()->json([
            'code' => 200,
            'amount' => $amount,
            'remainingBalance' => $remainingBalance,
            'result' => $result,
        ]);
    }

    public function record_invoice_payment()
    {
        //dd($this->request->all());
        $ref_invoice = $this->request->input('ref_invoice');
        $id_booking = $this->request->input('id_booking');
        $total_price = $this->request->input('total_price');
        $total_services = $this->request->input('total_services');
        $payment_methods_invoice_record = $this->request->input('payment_methods_invoice_record');
        $amount_invoice_record = $this->request->input('amount_invoice_record');

        $total_service_included = $total_price + $total_services;

        $booking = Booking::where('id', $id_booking)->first();
        $invoice = Invoice::where('reference', $ref_invoice)->first();

        $service_assigns = ServiceAssignReservation::where('ref_reservation_assgn', $booking->reference_reservation)->get();

        DB::table('bookings')
            ->where('id', $id_booking)
            ->update([
                'confirmed' => 1,
                'updated_at' => new \DateTimeImmutable,
            ]);

        if($invoice)
        {
            //
            Encaissement::create([
                'description' => 'invoice.collection_of_the_invoice',
                'reference_enc' => $ref_invoice,
                'amount' => $amount_invoice_record,
                'id_pay_meth' => $payment_methods_invoice_record,
            ]);

            return redirect()->route('app_invoices')->with('success', __('invoice.payment_registered_successfully'));
        }
        else
        {
            $invoice = Invoice::create([
                'reference' => $ref_invoice,
                'price' => $total_price,
                'price_service_included' => $total_services,
                'id_booking' => $id_booking,
            ]);

            //
            $array = array();

            foreach ($service_assigns as $service_assign) {
                # code...

                //dd($service_assign->service->price);

                $array = [
                    'name' => $service_assign->service->name,
                    'price' => $service_assign->service->price,
                    'id_service' => $service_assign->service->id,
                    'id_invoice' => $invoice->id,
                ];

                //dd($data);

                ItemServiceInvoice::create($array);
            }

            ItemRoomInvoice::create([
                'room_number' => $booking->room->room_number,
                'room_cat_name' => $booking->room->category->description,
                'room_price' => $booking->room->category->price,
                'id_room' => $booking->room->id,
                'id_invoice' => $invoice->id,
            ]);

            Encaissement::create([
                'description' => 'invoice.collection_of_the_invoice',
                'reference_enc' => $ref_invoice,
                'amount' => $amount_invoice_record,
                'id_pay_meth' => $payment_methods_invoice_record,
            ]);

            return redirect()->route('app_invoices')->with('success', __('invoice.payment_registered_successfully'));
        }

    }
}
