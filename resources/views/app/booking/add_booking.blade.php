@extends('app.base-app')
@section('title', ($id_booking == 0) ? __('booking.add_booking') : __('booking.update_booking'))
@section('content')

<div id="app">

    @include('app.menu.navigation-menu')

    @include('app.menu.login-nav')

    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>{{ ($id_booking == 0) ? __('booking.add_booking') : __('booking.update_booking') }}</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav class="float-start float-lg-end" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ route('app_booking') }}">{{ __('booking.booking') }}</a></li>
                              <li class="breadcrumb-item active" aria-current="page">{{ ($id_booking == 0) ? __('booking.add_booking') : __('booking.update_booking') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        {{-- On inlut les messages flash--}}
        @include('app.message.flash-message')

        <section class="section">
            <div class="row">

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form id="save-booking-form" action="{{ route('app_save_booking') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_booking" value="{{ $id_booking }}">
                                <input type="hidden" name="ref_reservation" id="ref_reservation" value="{{ ($id_booking == 0) ? $ref_reservation : $booking->reference_reservation }}">
                                <input type="hidden" name="customerRequest" id="customerRequest" value="{{ ($id_booking == 0) ? 'add' : 'edit' }}">
                                <input type="hidden" name="days_difference" id="days_difference" value="{{ ($id_booking == 0) ? 0 : "" }}">

                                @include('app.booking.global-input')

                                <div class="mb-4 row">
                                    <div class="col-sm-4">{{ __('client.reference') }}</div>
                                    <div class="col-sm-8">{{ ($id_booking == 0) ? $ref_reservation : $booking->reference_reservation }}</div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="room_booking" class="col-sm-4 col-form-label">{{ __('room.room') }}*</label>
                                    <div class="col-sm-8">
                                        <select name="room_booking" id="room_booking" class="form-select @error('room_booking') is-invalid @enderror" onchange="select_room_booking('{{ csrf_token() }}', '{{ route('app_count_day') }}');" url_session="{{ route('app_room_session') }}" token_session="{{ csrf_token() }}">

                                            @if ($id_booking == 0)
                                                <option value="@if(Session::has('id_room_session')){{ Session::get('id_room_session') }}@endif" room_number="@if(Session::has('room_number_session')){{ Session::get('room_number_session') }}@endif" people_number="@if(Session::has('room_people_session')){{ Session::get('room_people_session') }}@endif" room_price="@if(Session::has('room_price_session')){{ Session::get('room_price_session') }}@endif"  room_cat_name="@if(Session::has('room_category_session')){{ Session::get('room_category_session') }}@endif" selected>
                                                    {{-- if id_room_session exist other room variabble exist  --}}
                                                    @if (Session::has('room_number_session'))
                                                        {{ Session::get('room_number_session') }} -
                                                        {{ Session::get('room_category_session') }} -
                                                        {{ number_format(Session::get('room_price_session'), 2, '.', ' ') }} {{ $deviseGest->iso_code }} {{ __('booking.per_night') }} -
                                                        {{ Session::get('room_people_session') }} -
                                                    @else
                                                        {{ __('room.select_a_room') }}
                                                    @endif
                                                </option>
                                            @else
                                                <option value="{{ $booking->room->id }}" selected>
                                                    {{ $booking->room->room_number }} -
                                                    {{ $booking->room->category->description }} -
                                                    {{ number_format($booking->room->category->price, 2, '.', ' ') }} {{ $deviseGest->iso_code }} {{ __('booking.per_night') }} -
                                                    {{ $booking->room->category->people_number }} -
                                                </option>
                                            @endif

                                            @foreach ($rooms as $room)
                                                <option value="{{ $room->id }}" room_number="{{ $room->room_number }}" people_number="{{ $room->category->people_number }}" room_price="{{ $room->category->price }}" room_cat_name="{{ $room->category->description }}">
                                                    {{ $room->room_number }} -
                                                    {{ $room->category->description }} -
                                                    {{ number_format($room->category->price, 2, '.', ' ') }} {{ $deviseGest->iso_code }} {{ __('booking.per_night') }} -
                                                    {{ $room->category->people_number }} -
                                                    {{-- Availibility --}}
                                                </option>
                                            @endforeach

                                        </select>
                                        <small class="text-danger">@error('room_booking') {{ $message }} @enderror</small>
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="booking_customer" class="col-sm-4 col-form-label">{{ __('client.customer') }}*</label>
                                    <div class="col-sm-8">
                                        <select name="booking_customer" id="booking_customer" class="form-select @error('booking_customer') is-invalid @enderror" onchange="select_customer_booking();">
                                            @if ($id_booking == 0)
                                                <option value="@if(Session::has('booking_id_customer_session')){{ Session::get('booking_id_customer_session') }}@endif" selected>
                                                    @if (Session::has('booking_customer_session'))
                                                        {{ Session::get('booking_customer_session') }}
                                                    @else
                                                        {{ __('booking.select_a_customer') }}
                                                    @endif
                                                </option>
                                            @else
                                                <option value="{{ $booking->customer->id }}" selected>
                                                    {{ $booking->customer->firtName }} {{ $booking->customer->lastName }}
                                                </option>
                                            @endif

                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}">
                                                    {{ $customer->firtName }} {{ $customer->lastName }}
                                                </option>
                                            @endforeach

                                        </select>
                                        <small class="text-danger">@error('booking_customer') {{ $message }} @enderror</small>
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="arrival_date_booking" class="col-sm-4 col-form-label">{{ __('booking.arrival_date') }}*</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control @error('arrival_date_booking') is-invalid @enderror" id="arrival_date_booking" name="arrival_date_booking" value="@if(Session::has('arrival_date_booking_session')){{ Session::get('arrival_date_booking_session') }}@else{{ ($id_booking == 0) ? old('arrival_date_booking') : date('Y-m-d', strtotime($booking->arrival_date)) }}@endif" onchange="select_arrival_date_booking('{{ csrf_token() }}', '{{ route('app_count_day') }}');">
                                        <small class="text-danger">@error('arrival_date_booking') {{ $message }} @enderror</small>
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="departure_date_booking" class="col-sm-4 col-form-label">{{ __('booking.departure_date') }}*</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control @error('departure_date_booking') is-invalid @enderror" id="departure_date_booking" name="departure_date_booking" value="@if(Session::has('departure_date_booking_session')){{ Session::get('departure_date_booking_session') }}@else{{ ($id_booking == 0) ? old('departure_date_booking') : date('Y-m-d', strtotime($booking->departure_date)) }}@endif" onchange="select_departure_date_booking('{{ csrf_token() }}', '{{ route('app_count_day') }}');">
                                        <small class="text-danger">@error('departure_date_booking') {{ $message }} @enderror</small>
                                    </div>
                                </div>
                            </form>

                            <div class="border-bottom mb-4 fw-bold">
                                {{ __('booking.other_services') }}
                            </div>


                            <form id="app_save_service_assign-form" action="{{ route('app_save_service_assign') }}" method="POST">
                                <div class="mb-4 row">
                                    @csrf

                                    <label for="service_booking" class="col-sm-4 col-form-label">Services</label>
                                    <div class="col-sm-8">
                                        <input type="hidden" name="ref_reservation_service" value="{{ ($id_booking == 0) ? $ref_reservation : $booking->reference_reservation }}">

                                        @include('app.booking.global-input')
                                        {{--
                                        <input type="hidden" name="id_room_session" class="id_room_session" value="@if(Session::has('id_room_session')){{ Session::get('id_room_session') }}@else{{ ($id_booking == 0) ? "" : "" }}@endif">
                                        <input type="hidden" name="room_number_session" class="room_number_session" value="@if(Session::has('room_number_session')){{ Session::get('room_number_session') }}@else{{ ($id_booking == 0) ? "" : "" }}@endif">
                                        <input type="hidden" name="room_category_session" class="room_category_session" value="@if(Session::has('room_category_session')){{ Session::get('room_category_session') }}@else{{ ($id_booking == 0) ? "" : "" }}@endif">
                                        <input type="hidden" name="room_price_session" class="room_price_session" value="@if(Session::has('room_price_session')){{ Session::get('room_price_session') }}@else{{ ($id_booking == 0) ? "" : "" }}@endif">
                                        <input type="hidden" name="room_people_session" class="room_people_session" value="@if(Session::has('room_people_session')){{ Session::get('room_people_session') }}@else{{ ($id_booking == 0) ? "" : "" }}@endif">

                                        <input type="hidden" name="booking_id_customer_session" class="booking_id_customer_session" value="@if(Session::has('booking_id_customer_session')){{ Session::get('booking_id_customer_session') }}@else{{ ($id_booking == 0) ? "" : "" }}@endif">
                                        <input type="hidden" name="booking_customer_session" class="booking_customer_session" value="@if(Session::has('booking_customer_session')){{ Session::get('booking_customer_session') }}@else{{ ($id_booking == 0) ? "" : "" }}@endif">

                                        <input type="hidden" name="arrival_date_booking_session" class="arrival_date_booking_session" value="@if(Session::has('arrival_date_booking_session')){{ Session::get('arrival_date_booking_session') }}@else{{ ($id_booking == 0) ? "" : "" }}@endif">
                                        <input type="hidden" name="departure_date_booking_session" class="departure_date_booking_session" value="@if(Session::has('departure_date_booking_session')){{ Session::get('departure_date_booking_session') }}@else{{ ($id_booking == 0) ? "" : "" }}@endif">

                                        <input type="hidden" name="total_price_booking_session" class="total_price_booking_session" value="@if(Session::has('total_price_booking_session')){{ Session::get('total_price_booking_session') }}@else{{ ($id_booking == 0) ? "" : "" }}@endif">
                                        <input type="hidden" name="total_price_service_included_session" class="total_price_service_included_session" value="@if(Session::has('total_price_service_included_session')){{ Session::get('total_price_service_included_session') }}@else{{ ($id_booking == 0) ? "" : "" }}@endif">
                                        --}}
                                        <div class="input-group">
                                            <select class="form-select @error('service_booking') is-invalid @enderror" id="service_booking" name="service_booking">
                                                <option value="" selected>{{ __('booking.select_a_service') }}</option>
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}">{{ $service->name }} - {{ number_format($service->price, 2, '.', ' ') }} {{ $deviseGest->iso_code }}</option>
                                                @endforeach>
                                            </select>
                                            <button class="btn btn-primary" type="submit">{{ __('auth.add') }}</button>
                                        </div>
                                        <small class="text-danger">@error('service_booking') {{ $message }} @enderror</small>
                                    </div>
                                </div>
                            </form>

                            <ul class="list-group">
                                @foreach ($service_assigns as $service_assign)

                                    <li class="list-group-item">
                                        <button class="btn btn-danger" onclick="deleteElement('{{ $service_assign->id }}', '{{ route('app_delete_service_assign') }}', '{{ csrf_token() }}')">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>&nbsp;&nbsp;
                                        <span>{{ $service_assign->service->name }} - {{ __('room.price') }} :
                                            {{ number_format($service_assign->service->price, 2, '.', ' ') }}
                                            {{ $deviseGest->iso_code }}
                                        </span>
                                    </li>

                                @endforeach

                                <li class="list-group-item bg-light fw-bold" aria-current="true">Total : {{ number_format($total_service_assigns, 2, '.', ' ') }} {{ $deviseGest->iso_code }}</li>
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">

                            <div class="border-bottom mb-4 fw-bold">
                                {{ __('booking.details') }}
                            </div>

                            <div class="mb-4">
                                <i class="fa-solid fa-bed"></i>&nbsp;&nbsp;
                                <span>{{ __('room.room') }} :</span>
                                <span class="fw-bold" id="room_number_details">
                                    @if (Session::has('room_number_session'))
                                        {{ Session::get('room_number_session') }}
                                    @else
                                        {{ ($id_booking == 0) ? "" : $booking->room->room_number }}
                                    @endif
                                </span>
                            </div>

                            <div class="mb-4">
                                <i class="fa-solid fa-user"></i>&nbsp;&nbsp;
                                <span>{{ __('booking.people') }} :</span>
                                <span class="fw-bold" id="people_number_details">
                                    @if (Session::has('room_people_session'))
                                        {{ Session::get('room_people_session') }}
                                    @else
                                        {{ ($id_booking == 0) ? "" : $booking->room->category->people_number }}
                                    @endif
                                </span>
                            </div>

                            <div class="mb-4">
                                <i class="fa-solid fa-people-roof"></i>&nbsp;&nbsp;
                                <span>{{ __('room.room_category') }} :</span>
                                <span class="fw-bold" id="room_category_details">
                                    @if (Session::has('room_category_session'))
                                        {{ Session::get('room_category_session') }}
                                    @else
                                        {{ ($id_booking == 0) ? "" : $booking->room->category->description }}
                                    @endif
                                </span>
                            </div>

                            <div class="mb-4">
                                <i class="fa-solid fa-person-walking-luggage"></i>&nbsp;&nbsp;
                                <span>{{ __('client.customer') }} :</span>
                                <span class="fw-bold" id="customer_booking_details">
                                    @if (Session::has('booking_customer_session'))
                                        {{ Session::get('booking_customer_session') }}
                                    @else
                                        {{ ($id_booking == 0) ? "" : $booking->customer->firtName . ' ' . $booking->customer->lastName }}
                                    @endif
                                </span>
                            </div>

                            <div class="mb-4">
                                <i class="fa-solid fa-calendar-check"></i>&nbsp;&nbsp;
                                <span>{{ __('booking.arrival_date') }} :</span>
                                <span class="fw-bold" id="arrival_date_booking_details">
                                    @if (Session::has('arrival_date_booking_session'))
                                        {{ Session::get('arrival_date_booking_session') }}
                                    @else
                                        {{ ($id_booking == 0) ? "" : date('Y-m-d', strtotime($booking->arrival_date)) }}
                                    @endif
                                </span>
                            </div>

                            <div class="mb-4">
                                <i class="fa-solid fa-calendar-xmark"></i>&nbsp;&nbsp;
                                <span>{{ __('booking.departure_date') }} :</span>
                                <span class="fw-bold" id="departure_date_booking_details">
                                    @if (Session::has('departure_date_booking_session'))
                                        {{ Session::get('departure_date_booking_session') }}
                                    @else
                                        {{ ($id_booking == 0) ? "" : date('Y-m-d', strtotime($booking->departure_date)) }}
                                    @endif
                                </span>
                            </div>

                            <div class="mb-4">
                                <i class="fa-solid fa-dollar-sign"></i>&nbsp;&nbsp;
                                <span>{{ __('booking.tarif') }} :</span>
                                <span class="fw-bold" id="total_price_booking_details">
                                    @if (Session::has('total_price_booking_session'))
                                        {{ Session::get('total_price_booking_session') }}
                                    @else
                                        {{ ($id_booking == 0) ? "0.00" : number_format($total_price, 2, '.', ' ') }}
                                    @endif
                                </span>
                                <span>{{ $deviseGest->iso_code }}</span>
                            </div>


                            <div class="mb-4">
                                <i class="fa-solid fa-bell-concierge"></i>&nbsp;&nbsp;
                                <span>{{ __('booking.other_services') }} :</span>
                                <span class="fw-bold" id="booking_other_services_details">
                                    {{ number_format($total_service_assigns, 2, '.', ' ') }}
                                </span>
                                <span>{{ $deviseGest->iso_code }}</span>
                            </div>

                            <div class="border-bottom mb-4 fw-bold">
                            </div>

                            <div class="mb-4 fw-bold">
                                Total :
                                    <span id="total_booking_details">
                                        @if (Session::has('total_price_booking_session'))
                                            @php
                                                $total_price_booking_session = Session::get('total_price_booking_session');
                                            @endphp
                                            {{ number_format($total_service_assigns + $total_price_booking_session, 2, '.', ' ') }}
                                        @else
                                            {{ ($id_booking == 0) ? number_format($total_service_assigns, 2, '.', ' ') : number_format($total_price + $total_service_assigns, 2, '.', ' ') }}
                                        @endif
                                    </span>
                                </span>
                                <span>{{ $deviseGest->iso_code }}</span>
                            </div>

                            <div class="text-end">
                                @if ($id_booking != 0)
                                    @if ($booking->confirmed != 0)
                                        <button class="btn btn-danger" type="button" disabled>
                                            <i class="fa-solid fa-trash-can"></i>
                                            {{ __('entreprise.delete') }}
                                        </button>
                                    @else
                                        <button class="btn btn-danger" type="button">
                                            <i class="fa-solid fa-trash-can"></i>
                                            {{ __('entreprise.delete') }}
                                        </button>
                                    @endif
                                @endif
                                <button class="btn btn-primary" id="booking-reserve" type="button">
                                    @if ($id_booking == 0)
                                        <i class="fa-solid fa-calendar-check"></i>
                                        {{ __('booking.reserve') }}
                                    @else
                                        <i class="fa-solid fa-floppy-disk"></i>
                                        {{ __('main.save') }}
                                    @endif
                                </button>
                                @if ($id_booking != 0)
                                    @if ($booking->confirmed == 0)
                                        <button class="btn btn-success" type="button">
                                            <i class="fa-solid fa-credit-card"></i>&nbsp;
                                            {{ __('booking.confirm') }}
                                        </button>
                                    @endif
                                @endif
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </section>

        <div class="m-5">
            @include('app.menu.footer-global')
        </div>

    </div>
</div>

@endsection

