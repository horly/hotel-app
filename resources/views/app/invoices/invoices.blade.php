@extends('app.base-app')
@section('title', __('dashboard.invoices'))
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
                        <h3>{{ __('dashboard.invoices') }}</h3>
                        <p class="text-subtitle text-muted">{{ __('invoice.invoices_list') }}</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav class="float-start float-lg-end" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ route('app_dashboard') }}">{{ __('dashboard.dashboard') }}</a></li>
                              <li class="breadcrumb-item active" aria-current="page">{{ __('invoice.invoices_list') }}</li>
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

                    <table class="table table-striped table-hover border bootstrap-datatable">
                        <thead>
                            <th>N°</th>
                            <th>{{ __('client.reference') }}</th>
                            <th>{{ __('room.room_number') }}</th>
                            <th>{{ __('room.room_category') }}</th>
                            <th>{{ __('invoice.days_number') }}</th>
                            <th class="text-end">{{ __('room.price') }} {{ $deviseGest->iso_code }}</th>
                            <th class="text-end">{{ __('booking.other_services') }} {{ $deviseGest->iso_code }}</th>
                            <th class="text-end">Total {{ $deviseGest->iso_code }}</th>
                            <th>{{ __('client.customer') }}</th>
                            <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $invoice)
                                @php
                                    $item_room_invoices = App\Models\ItemRoomInvoice::where('id_invoice', $invoice->id)->first();
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ route('app_add_invoice', [
                                                'id_booking'=> $invoice->booking->id,
                                                'ref_invoice' => $invoice->reference ]) }}">
                                            {{ $invoice->reference }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $item_room_invoices->room_number }}
                                    </td>
                                    <td>
                                        {{ $item_room_invoices->room_cat_name }}
                                    </td>

                                    <td>
                                        @php
                                            $arrival_date_booking = date('Y-m-d', strtotime($invoice->booking->arrival_date));
                                            $departure_date_booking = date('Y-m-d', strtotime($invoice->booking->departure_date));

                                            $date1 = Carbon\Carbon::parse($arrival_date_booking);
                                            $date2 = Carbon\Carbon::parse($departure_date_booking);

                                            $daysDifference = $date1->diffInDays($date2);
                                            //$total_price = $daysDifference * $invoice->itemServiceInvoice->room_price;

                                        @endphp
                                        {{ $daysDifference }}
                                    </td>
                                    <td class="text-end">
                                        {{ number_format($invoice->price, 2, '.', ' ') }}
                                    </td>
                                    <td class="text-end">
                                        {{ number_format($invoice->price_service_included, 2, '.', ' ') }}
                                    </td>
                                    <td class="text-end">
                                        {{ number_format($invoice->price + $invoice->price_service_included, 2, '.', ' ') }}
                                    </td>
                                    <td>
                                        {{ $invoice->booking->customer->firtName }} {{ $invoice->booking->customer->lastName }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('app_add_invoice', [
                                                'id_booking'=> $invoice->booking->id,
                                                'ref_invoice' => $invoice->reference ]) }}">
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
