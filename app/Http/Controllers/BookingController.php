<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveBookingForm;
use App\Http\Requests\SaveServiceAssignRequest;
use App\Models\Booking;
use App\Models\Customer;
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

        $bookings = Booking::all();

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

        $total_price = 0.00;

        if($booking)
        {
            $arrival_date_booking = date('Y-m-d', strtotime($booking->arrival_date));
            $departure_date_booking = date('Y-m-d', strtotime($booking->departure_date));

            $date1 = Carbon::parse($arrival_date_booking);
            $date2 = Carbon::parse($departure_date_booking);

            $daysDifference = $date1->diffInDays($date2);
            $total_price = $daysDifference * $booking->room->category->price;
        }

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
            'total_price',
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

        $this->request->session()->forget('booking_id_customer_session');
        $this->request->session()->forget('booking_customer_session');

        $this->request->session()->forget('arrival_date_booking_session');
        $this->request->session()->forget('departure_date_booking_session');

        $this->request->session()->forget('total_price_booking_session');
        $this->request->session()->forget('total_price_service_included_session');

        return redirect()->route('app_add_booking', ['id' => $id, 'reference' => $ref_reservation]);

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

        $booking_id_customer_session = $this->request->input('booking_id_customer_session');
        $booking_customer_session = $this->request->input('booking_customer_session');

        $arrival_date_booking_session = $this->request->input('arrival_date_booking_session');
        $departure_date_booking_session = $this->request->input('departure_date_booking_session');

        $total_price_booking_session = $this->request->input('total_price_booking_session');
        $total_price_service_included_session = $this->request->input('total_price_service_included_session');

        Session::put('id_room_session', $id_room_session);
        Session::put('room_number_session', $room_number_session);
        Session::put('room_category_session', $room_category_session);
        Session::put('room_price_session', $room_price_session);
        Session::put('room_people_session', $room_people_session);

        Session::put('booking_id_customer_session', $booking_id_customer_session);
        Session::put('booking_customer_session', $booking_customer_session);

        Session::put('arrival_date_booking_session', $arrival_date_booking_session);
        Session::put('departure_date_booking_session', $departure_date_booking_session);

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


        $total_include_service = $total_service_assigns + $total_price;

        return response()->json([
            'code' => 200,
            'daysDifference' => $daysDifference,
            'total_price' => number_format($total_price, 2, '.', ' '),
            'total_include_service' => number_format($total_include_service, 2, '.', ' '),
            'ref_reservation' => $ref_reservation,
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

        $booking_id_customer_session = $requestF->input('booking_id_customer_session');
        $booking_customer_session = $requestF->input('booking_customer_session');

        $arrival_date_booking_session = $requestF->input('arrival_date_booking_session');
        $departure_date_booking_session = $requestF->input('departure_date_booking_session');

        $total_price_booking_session = $requestF->input('total_price_booking_session');
        $total_price_service_included_session = $requestF->input('total_price_service_included_session');

        Session::put('id_room_session', $id_room_session);
        Session::put('room_number_session', $room_number_session);
        Session::put('room_category_session', $room_category_session);
        Session::put('room_price_session', $room_price_session);
        Session::put('room_people_session', $room_people_session);

        Session::put('booking_id_customer_session', $booking_id_customer_session);
        Session::put('booking_customer_session', $booking_customer_session);

        Session::put('arrival_date_booking_session', $arrival_date_booking_session);
        Session::put('departure_date_booking_session', $departure_date_booking_session);

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
