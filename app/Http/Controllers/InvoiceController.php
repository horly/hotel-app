<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
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

        return view('app.invoices.invoices', compact(
            'deviseGest'
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

        return view('app.invoices.add_invoice', compact(
            'ref_invoice',
            'booking',
            'number_of_day',
            'deviseGest',
            'total_price'
        ));
    }
}
