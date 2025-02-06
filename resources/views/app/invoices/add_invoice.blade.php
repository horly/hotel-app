@extends('app.base-app')
@section('title', __('invoice.payment'))
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
                        <h3>{{ __('invoice.payment') }}</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav class="float-start float-lg-end" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ route('app_invoices') }}">{{ __('dashboard.invoices') }}</a></li>
                              <li class="breadcrumb-item active" aria-current="page">{{ __('invoice.payment') }}</li>
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

                    <div class="mb-4 row">
                        <div class="col-sm-4">{{ __('invoice.invoice_reference') }}</div>
                        <div class="col-sm-8 fw-bold">{{ $ref_invoice }}</div>
                    </div>

                    <div class="mb-4 row">
                        <div class="col-sm-4">{{ __('room.room') }}</div>
                        <div class="col-sm-8 fw-bold">{{ $booking->room->room_number }} - {{ $booking->room->category->description }}</div>
                    </div>

                    <div class="mb-4 row">
                        <div class="col-sm-4">{{ __('client.customer') }}</div>
                        <div class="col-sm-8 fw-bold">{{ $booking->customer->firtName }} {{ $booking->customer->lastName }}</div>
                    </div>

                    <div class="mb-4 row">
                        <div class="col-sm-4">{{ __('booking.arrival_date') }}</div>
                        <div class="col-sm-8 fw-bold">{{ date('d-m-Y', strtotime($booking->arrival_date)) }}</div>
                    </div>

                    <div class="mb-4 row">
                        <div class="col-sm-4">{{ __('booking.departure_date') }}</div>
                        <div class="col-sm-8 fw-bold">{{ date('d-m-Y', strtotime($booking->departure_date)) }}</div>
                    </div>

                    <div class="mb-4 row">
                        <div class="col-sm-4">{{ __('booking.number_of_days') }}</div>
                        <div class="col-sm-8 fw-bold">{{ $number_of_day }}</div>
                    </div>

                    <div class="mb-4 row">
                        <div class="col-sm-4">{{ __('booking.price_per_night') }}</div>
                        <div class="col-sm-8 fw-bold">{{ number_format($booking->room->category->price, 2, '.', ' ') }} {{ $deviseGest->iso_code }}</div>
                    </div>

                    <div class="mb-4 row">
                        <div class="col-sm-4">{{ __('booking.total_price') }}</div>
                        <div class="col-sm-8 fw-bold">{{ number_format($total_price, 2, '.', ' ') }} {{ $deviseGest->iso_code }}</div>
                    </div>

                    <div class="mb-4">

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
