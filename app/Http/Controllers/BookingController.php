<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveBookingForm;
use App\Http\Requests\SaveServiceAssignRequest;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Room;
use App\Models\Service;
use App\Models\ServiceAssignReservation;
use App\Repository\GenerateRefenceNumber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    //
    protected $request;
    protected $generateReferenceNumber;

    function __construct(Request $request, GenerateRefenceNumber $generateReferenceNumber)
    {
        $this->request = $request;
        $this->generateReferenceNumber = $generateReferenceNumber;
    }

    public function booking()
    {
        $deviseGest = DB::table('devise_gestions')
            ->join('devises', 'devise_gestions.id_devise', '=', 'devises.id')
            ->where([
                'devise_gestions.default_cur_manage' => 1,
        ])->first();

        $bookings = Booking::orderBy('id', 'desc')->get();

        return view('app.booking.booking', compact('deviseGest', 'bookings'));
    }

    public function add_booking($id, $reference)
    {
        $id_booking = $id;

        $deviseGest = DB::table('devise_gestions')
            ->join('devises', 'devise_gestions.id_devise', '=', 'devises.id')
            ->where([
                'devise_gestions.default_cur_manage' => 1,
        ])->first();

        $rooms = Room::all();
        $customers = Customer::all();
        $services = Service::all();

        $ref_reservation = $reference;

        $service_assigns = ServiceAssignReservation::where('ref_reservation_assgn', $ref_reservation)->get();

        $total_service_assigns = DB::table('services')
                                ->join('service_assign_reservations', 'service_assign_reservations.id_service', '=', 'services.id')
                                ->where('service_assign_reservations.ref_reservation_assgn', $ref_reservation)
                                ->sum('services.price');

        $booking = Booking::where('id', $id_booking)->first();

        $number_of_day = 0;
        $price_per_night = 0.00;
        $total_price = 0.00;

        $total_service_assigns_perday = $total_service_assigns;

        $invoice = null;
        $countGl = 0;

        if($booking)
        {
            $arrival_date_booking = date('Y-m-d', strtotime($booking->arrival_date));
            $departure_date_booking = date('Y-m-d', strtotime($booking->departure_date));

            $date1 = Carbon::parse($arrival_date_booking);
            $date2 = Carbon::parse($departure_date_booking);

            $price_per_night = $booking->room->category->price;

            $daysDifference = $date1->diffInDays($date2);
            $total_price = $daysDifference * $price_per_night;

            $number_of_day = $daysDifference;

            $total_service_assigns_perday = $total_service_assigns * $number_of_day;

            //dd($departure_date_booking);

            Session::put('number_of_days_session', $number_of_day);
            Session::put('total_price_service_included_session', number_format($total_price + $total_service_assigns_perday, 2, '.', ' '));
            Session::put('booking_other_services_session', number_format($total_service_assigns_perday, 2, '.', ' '));

            $invoice = Invoice::where('id_booking', $booking->id)->first();

            $bookings = Booking::where([
                'confirmed' => 1,
                'id_room' => $booking->room->id
            ])->get();

            foreach ($bookings as $bke) {
            $nowGl = date('Y-m-d');
            $departure_date_bookingGl = date('Y-m-d', strtotime($bke->departure_date));

            $date1Gl = Carbon::parse($nowGl);
            $date2Gl = Carbon::parse($departure_date_bookingGl);

            $daysDifferenceGl = $date1Gl->diffInDays($date2Gl);

            if ($daysDifferenceGl > 0) {
                $countGl++;
                }
            }
        }



        //dd($number_of_day);

        return view('app.booking.add_booking', compact(
            'id_booking',
            'rooms',
            'customers',
            'deviseGest',
            'services',
            'ref_reservation',
            'service_assigns',
            'total_service_assigns',
            'booking',
            'price_per_night',
            'total_price',
            'number_of_day',
            'total_service_assigns_perday',
            'invoice',
            'countGl',
        ));
    }

    public function setup_reservation($id)
    {
        $ref_reservation = "RES" . date('Y') . date('m') . date('d') . date('H') . date('i') . date('s') . Auth::user()->id;

        $this->request->session()->forget('id_room_session');
        $this->request->session()->forget('room_number_session');
        $this->request->session()->forget('room_category_session');
        $this->request->session()->forget('room_price_session');
        $this->request->session()->forget('room_people_session');
        $this->request->session()->forget('count_availbty_session');

        $this->request->session()->forget('booking_id_customer_session');
        $this->request->session()->forget('booking_customer_session');

        $this->request->session()->forget('arrival_date_booking_session');
        $this->request->session()->forget('departure_date_booking_session');

        $this->request->session()->forget('number_of_days_session');
        $this->request->session()->forget('price_per_night_session');

        $this->request->session()->forget('booking_other_services_session');

        $this->request->session()->forget('total_price_booking_session');
        $this->request->session()->forget('total_price_service_included_session');

        $booking = Booking::where('id', $id)->first();

        if($booking)
        {
            return redirect()->route('app_add_booking', ['id' => $booking->id, 'reference' => $booking->reference_reservation]);
        }
        else
        {
            return redirect()->route('app_add_booking', ['id' => $id, 'reference' => $ref_reservation]);
        }

    }

    public function save_booking()
    {
        //code
        $id_booking = $this->request->input('id_booking');
        $ref_reservation = $this->request->input('ref_reservation');
        $customerRequest = $this->request->input('customerRequest');

        $id_room_session = $this->request->input('id_room_session');
        $room_number_session = $this->request->input('room_number_session');
        $room_category_session = $this->request->input('room_category_session');
        $room_price_session = $this->request->input('room_price_session');
        $room_people_session = $this->request->input('room_people_session');
        $count_availbty_session = $this->request->input('count_availbty_session');

        $booking_id_customer_session = $this->request->input('booking_id_customer_session');
        $booking_customer_session = $this->request->input('booking_customer_session');

        $arrival_date_booking_session = $this->request->input('arrival_date_booking_session');
        $departure_date_booking_session = $this->request->input('departure_date_booking_session');

        $number_of_days_session = $this->request->input('number_of_days_session');
        $price_per_night_session = $this->request->input('price_per_night_session');

        $booking_other_services_session = $this->request->input('booking_other_services_session');

        $total_price_booking_session = $this->request->input('total_price_booking_session');
        $total_price_service_included_session = $this->request->input('total_price_service_included_session');

        Session::put('id_room_session', $id_room_session);
        Session::put('room_number_session', $room_number_session);
        Session::put('room_category_session', $room_category_session);
        Session::put('room_price_session', $room_price_session);
        Session::put('room_people_session', $room_people_session);
        Session::put('count_availbty_session', $count_availbty_session);

        Session::put('booking_id_customer_session', $booking_id_customer_session);
        Session::put('booking_customer_session', $booking_customer_session);

        Session::put('arrival_date_booking_session', $arrival_date_booking_session);
        Session::put('departure_date_booking_session', $departure_date_booking_session);

        Session::put('booking_other_services_session', $booking_other_services_session);

        Session::put('number_of_days_session', $number_of_days_session);
        Session::put('price_per_night_session', $price_per_night_session);

        Session::put('total_price_booking_session', $total_price_booking_session);
        //Session::put('total_price_service_included_session', $total_price_service_included_session);

        $validated = $this->request->validate([
            'room_booking' => 'required',
            'booking_customer' => 'required',
            'arrival_date_booking' => 'required|date',
            'departure_date_booking' => 'required|date',
        ], [
            'room_booking.required' => __('room.please_select_a_room'),
            'booking_customer.required' => __('booking.please_select_a_customer'),
            'arrival_date_booking.required' =>  __('booking.please_select_the_arrival_date'),
            'departure_date_booking.required' => __('booking.please_select_departure_date'),
        ]);

        if($customerRequest != "edit")
        {
            Booking::create([
                'reference_reservation' => $ref_reservation,
                'arrival_date' => $arrival_date_booking_session,
                'departure_date' => $departure_date_booking_session,
                'id_customer' => $booking_id_customer_session,
                'id_room' => $id_room_session,
            ]);

            return redirect()->route('app_booking')->with('success', __('booking.booking_registered_successfully'));
        }
        else
        {
            DB::table('bookings')
                ->where('id', $id_booking)
                ->update([
                    'reference_reservation' => $ref_reservation,
                    'arrival_date' => $arrival_date_booking_session,
                    'departure_date' => $departure_date_booking_session,
                    'id_customer' => $booking_id_customer_session,
                    'id_room' => $id_room_session,
                    'updated_at' => new \DateTimeImmutable,
            ]);

            return redirect()->route('app_booking')->with('success', __('booking.booking_updated_successfully'));
        }
    }

    public function count_day()
    {
        $id_room = $this->request->input('id_room');
        $arrival_date_booking = $this->request->input('arrival_date_booking');
        $departure_date_booking = $this->request->input('departure_date_booking');
        $room_price = $this->request->input('room_price');
        $ref_reservation = $this->request->input('ref_reservation');

        //dd($this->request->all());

        $date1 = Carbon::parse($arrival_date_booking);
        $date2 = Carbon::parse($departure_date_booking);

        $daysDifference = $date1->diffInDays($date2);
        $total_price = $daysDifference * $room_price;

        $total_service_assigns = DB::table('services')
                                ->join('service_assign_reservations', 'service_assign_reservations.id_service', '=', 'services.id')
                                ->where('service_assign_reservations.ref_reservation_assgn', $ref_reservation)
                                ->sum('services.price');

        $total_service_assigns_perday = $total_service_assigns * $daysDifference;

        $total_include_service = $total_service_assigns + $total_price;


        $bookings = Booking::where([
            'confirmed' => 1,
            'id_room' => $id_room
        ])->get();

        $count = 0;

        foreach ($bookings as $bktd) {
            $now = date('Y-m-d');

            $date1d = Carbon::parse($now);
            $date2d = Carbon::parse($bktd->departure_date);

            $daysDifferenced = $date1d->diffInDays($date2d);

            if ($daysDifferenced > 0) {
                $count++;
            }
        }

        $availabilityText = "";

        if ($count <= 0) {
            $availabilityText = __('booking.available');
        } else {
            $availabilityText = __('booking.not_available');
        }

        $total_all = $total_price + $total_service_assigns_perday;


        return response()->json([
            'code' => 200,
            'daysDifference' => $daysDifference,
            'room_price' => number_format($room_price, 2, '.', ' '),
            'total_price' => number_format($total_price, 2, '.', ' '),
            'total_include_service' => number_format($total_include_service, 2, '.', ' '),
            'ref_reservation' => $ref_reservation,
            'total_service_assigns' => number_format($total_service_assigns, 2, '.', ' '),
            'total_service_assigns_perday' => number_format($total_service_assigns_perday, 2, '.', ' '),
            'availabilityText' => $availabilityText,
            'count' => $count,
            'total_all' => number_format($total_all, 2, '.', ' '),
        ]);
    }

    public function save_service_assign(SaveServiceAssignRequest $requestF)
    {
        //dd($requestF->all());

        $service_booking = $requestF->input('service_booking');
        $ref_reservation_service = $requestF->input('ref_reservation_service');

        $id_room_session = $requestF->input('id_room_session');
        $room_number_session = $requestF->input('room_number_session');
        $room_category_session = $requestF->input('room_category_session');
        $room_price_session = $requestF->input('room_price_session');
        $room_people_session = $requestF->input('room_people_session');
        $count_availbty_session = $requestF->input('count_availbty_session');

        $booking_id_customer_session = $requestF->input('booking_id_customer_session');
        $booking_customer_session = $requestF->input('booking_customer_session');

        $arrival_date_booking_session = $requestF->input('arrival_date_booking_session');
        $departure_date_booking_session = $requestF->input('departure_date_booking_session');

        $booking_other_services_session = $requestF->input('booking_other_services_session');

        $number_of_days_session = $this->request->input('number_of_days_session');
        $price_per_night_session = $this->request->input('price_per_night_session');

        $total_price_booking_session = $requestF->input('total_price_booking_session');
        $total_price_service_included_session = $requestF->input('total_price_service_included_session');

        Session::put('id_room_session', $id_room_session);
        Session::put('room_number_session', $room_number_session);
        Session::put('room_category_session', $room_category_session);
        Session::put('room_price_session', $room_price_session);
        Session::put('room_people_session', $room_people_session);
        Session::put('count_availbty_session', $count_availbty_session);

        Session::put('booking_id_customer_session', $booking_id_customer_session);
        Session::put('booking_customer_session', $booking_customer_session);

        Session::put('arrival_date_booking_session', $arrival_date_booking_session);
        Session::put('departure_date_booking_session', $departure_date_booking_session);

        //Session::put('booking_other_services_session', $booking_other_services_session);

        Session::put('number_of_days_session', $number_of_days_session);
        Session::put('price_per_night_session', $price_per_night_session);

        Session::put('total_price_booking_session', $total_price_booking_session);
        //Session::put('total_price_service_included_session', $total_price_service_included_session);


        $service_exist = ServiceAssignReservation::where([
            ['id_service', '=', $service_booking],
            ['ref_reservation_assgn', '=', $ref_reservation_service]
        ])->first();

        if(!$service_exist)
        {
            ServiceAssignReservation::create([
                'ref_reservation_assgn' => $ref_reservation_service,
                'id_service' => $service_booking,
            ]);

            $service = Service::where('id', $service_booking)->first();

            $result = $service->price * $number_of_days_session;
            $total = number_format($result + $booking_other_services_session, 2, '.', ' ');
            $total_all = number_format($total + $total_price_booking_session, 2, '.', ' ');

            Session::put('booking_other_services_session', $total);
            Session::put('total_price_service_included_session', $total_all);

            //dd($total_all);
            return redirect()->back()->with('success', __('service.service_added_successfully'));
        }
        else
        {
            return redirect()->back()->with('danger', __('booking.this_service_has_already_been_added'));
        }
    }

    public function delete_service_assign()
    {
        $id_element = $this->request->input('id_element');

        $service_assign = ServiceAssignReservation::where('id', $id_element)->first();
        $service = Service::where('id', $service_assign->id_service)->first();

        $number_of_days = Session::get('number_of_days_session');
        $total_price = Session::get('total_price_service_included_session');
        $booking_other_services = Session::get('booking_other_services_session');

        $service_price = $service->price * $number_of_days;
        $total = $total_price - $service_price;

        $other_service = $booking_other_services - $service_price;

        Session::put('booking_other_services_session', $other_service);
        Session::put('total_price_service_included_session', $total);

        DB::table('service_assign_reservations')->where('id', $id_element)->delete();

        return redirect()->back()->with('success', __('service.service_successfully_deleted'));
    }

    public function app_room_session()
    {
        $id_room = $this->request->input('id_room');
        $text_room = $this->request->input('text_room');

        //Session::put('id_room', $id_room);
        //Session::put('text_room', $text_room);

        return response()->json([
            'code' => 200,
            'id_room' => 'id_room',
            'text_room' => 'text_room',
        ]);
    }
}
