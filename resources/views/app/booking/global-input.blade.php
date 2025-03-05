<input type="hidden" name="id_room_session" class="id_room_session" value="@if(Session::has('id_room_session')){{ Session::get('id_room_session') }}@else{{ ($id_booking == 0) ? "" : $booking->room->id }}@endif">
<input type="hidden" name="room_number_session" class="room_number_session" value="@if(Session::has('room_number_session')){{ Session::get('room_number_session') }}@else{{ ($id_booking == 0) ? "" : $booking->room->room_number }}@endif">
<input type="hidden" name="room_category_session" class="room_category_session" value="@if(Session::has('room_category_session')){{ Session::get('room_category_session') }}@else{{ ($id_booking == 0) ? "" : $booking->room->category->description }}@endif">
<input type="hidden" name="room_price_session" class="room_price_session" value="@if(Session::has('room_price_session')){{ Session::get('room_price_session') }}@else{{ ($id_booking == 0) ? "" : $booking->room->category->price }}@endif">
<input type="hidden" name="room_people_session" class="room_people_session" value="@if(Session::has('room_people_session')){{ Session::get('room_people_session') }}@else{{ ($id_booking == 0) ? "" : $booking->room->category->people_number }}@endif">

<input type="hidden" name="count_availbty_session" class="count_availbty_session" value="@if(Session::has('count_availbty_session')){{ Session::get('count_availbty_session') }}@else{{ ($id_booking == 0) ? "" : $countGl }}@endif">

<input type="hidden" name="booking_id_customer_session" class="booking_id_customer_session" value="@if(Session::has('booking_id_customer_session')){{ Session::get('booking_id_customer_session') }}@else{{ ($id_booking == 0) ? "" : $booking->customer->id }}@endif">
<input type="hidden" name="booking_customer_session" class="booking_customer_session" value="@if(Session::has('booking_customer_session')){{ Session::get('booking_customer_session') }}@else{{ ($id_booking == 0) ? "" : $booking->customer->firtName . ' ' . $booking->customer->lastName }}@endif">

<input type="hidden" name="arrival_date_booking_session" class="arrival_date_booking_session" value="@if(Session::has('arrival_date_booking_session')){{ Session::get('arrival_date_booking_session') }}@else{{ ($id_booking == 0) ? "" : date('Y-m-d', strtotime($booking->arrival_date)) }}@endif">
<input type="hidden" name="departure_date_booking_session" class="departure_date_booking_session" value="@if(Session::has('departure_date_booking_session')){{ Session::get('departure_date_booking_session') }}@else{{ ($id_booking == 0) ? "" : date('Y-m-d', strtotime($booking->departure_date)) }}@endif">

<input type="hidden" name="number_of_days_session" class="number_of_days_session" value="@if(Session::has('number_of_days_session')){{ Session::get('number_of_days_session') }}@else{{ $number_of_day }}@endif">
<input type="hidden" name="price_per_night_session" class="price_per_night_session" value="@if(Session::has('price_per_night_session')){{ Session::get('price_per_night_session') }}@else{{ number_format($price_per_night, 2, '.', ' ') }}@endif">

<input type="hidden" name="booking_other_services_session" class="booking_other_services_session" value="@if(Session::has('booking_other_services_session')){{ Session::get('booking_other_services_session') }}@else{{ number_format($total_service_assigns_perday, 2, '.', ' ') }}@endif">

<input type="hidden" name="total_price_booking_session" class="total_price_booking_session" value="@if(Session::has('total_price_booking_session')){{ Session::get('total_price_booking_session') }}@else{{ number_format($total_price, 2, '.', ' ') }}@endif">
<input type="hidden" name="total_price_service_included_session" class="total_price_service_included_session" value="@if(Session::has('total_price_service_included_session')){{ Session::get('total_price_service_included_session') }}@else{{ ($id_booking == 0) ? "" : number_format($total_price + $total_service_assigns_perday, 2, '.', ' ') }}@endif">
