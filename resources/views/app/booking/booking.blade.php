@extends('app.base-app')
@section('title', __('booking.booking'))
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
                        <h3>{{ __('booking.booking') }}</h3>
                        <p class="text-subtitle text-muted">{{ __('booking.booking_list') }}</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav class="float-start float-lg-end" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ route('app_dashboard') }}">{{ __('dashboard.dashboard') }}</a></li>
                              <li class="breadcrumb-item active" aria-current="page">{{ __('booking.booking_list') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

         {{-- On inlut les messages flash--}}
         @include('app.message.flash-message')

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('app_setup_reservation', ['id' => 0]) }}" class="btn btn-primary mb-3" role="button">
                        <i class="fa-solid fa-circle-plus"></i>
                        &nbsp;{{ __('auth.add') }}
                    </a>

                    <table class="table table-striped table-hover border bootstrap-datatable">
                        <thead>
                            <th>N°</th>
                            <th>{{ __('client.reference') }}</th>
                            <th>{{ __('room.room_number') }}</th>
                            <th>{{ __('room.room_category') }}</th>
                            <th class="text-end">{{ __('room.price') }} {{ $deviseGest->iso_code }}</th>
                            <th class="text-end">{{ __('booking.other_services') }} {{ $deviseGest->iso_code }}</th>
                            <th class="text-end">Total {{ $deviseGest->iso_code }}</th>
                            <th>{{ __('booking.arrival_date') }}</th>
                            <th>{{ __('booking.departure_date') }}</th>
                            <th>{{ __('room.number_of_people') }}</th>
                            <th>{{ __('client.customer') }}</th>
                            <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                        @if ($booking->confirmed == 1)
                                            <i class="fa-solid fa-circle text-success"></i>
                                        @else
                                            <i class="fa-solid fa-circle text-danger"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('app_add_booking', [ 'id'=> $booking->id, 'reference' => $booking->reference_reservation ]) }}">
                                            {{ $booking->reference_reservation }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $booking->room->room_number }}
                                    </td>
                                    <td>
                                        {{ $booking->room->category->description }}
                                    </td>
                                    <td class="text-end">

                                        @php
                                            $arrival_date_booking = date('Y-m-d', strtotime($booking->arrival_date));
                                            $departure_date_booking = date('Y-m-d', strtotime($booking->departure_date));

                                            $date1 = Carbon\Carbon::parse($arrival_date_booking);
                                            $date2 = Carbon\Carbon::parse($departure_date_booking);

                                            $daysDifference = $date1->diffInDays($date2);
                                            $total_price = $daysDifference * $booking->room->category->price;

                                        @endphp

                                        {{ number_format($total_price, 2, '.', ' ') }}
                                    </td>
                                    <td class="text-end">
                                        @php
                                            $total_service_assigns = DB::table('services')
                                                ->join('service_assign_reservations', 'service_assign_reservations.id_service', '=', 'services.id')
                                                ->where('service_assign_reservations.ref_reservation_assgn', $booking->reference_reservation)
                                                ->sum('services.price');
                                        @endphp
                                        {{ number_format($total_service_assigns, 2, '.', ' ') }}
                                    </td>
                                    <td class="text-end">
                                        {{ number_format($total_price + $total_service_assigns, 2, '.', ' ') }}
                                    </td>
                                    <td>
                                        {{ date('Y-m-d', strtotime($booking->arrival_date)) }}
                                    </td>
                                    <td>
                                        {{ date('Y-m-d', strtotime($booking->departure_date)) }}
                                    </td>
                                    <td>
                                        {{ $booking->room->category->people_number }}
                                    </td>
                                    <td>
                                        {{ $booking->customer->firtName }} {{ $booking->customer->lastName }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('app_add_booking', [ 'id'=> $booking->id, 'reference' => $booking->reference_reservation ]) }}">
                                            {{ __('main.show') }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>

        <div class="m-5">
            @include('app.menu.footer-global')
        </div>

    </div>
</div>

@endsection
