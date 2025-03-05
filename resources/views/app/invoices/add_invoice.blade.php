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
                        <div class="col-sm-8 fw-bold">
                            @if ($invoice)
                                {{ $item_room_invoice->room_number }} - {{ $item_room_invoice->room_cat_name }}
                            @else
                                {{ $booking->room->room_number }} - {{ $booking->room->category->description }}
                            @endif
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <div class="col-sm-4">{{ __('client.customer') }}</div>
                        <div class="col-sm-8 fw-bold">
                            {{ $booking->customer->firtName }} {{ $booking->customer->lastName }}
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <div class="col-sm-4">{{ __('booking.arrival_date') }}</div>
                        <div class="col-sm-8 fw-bold">
                            {{ date('d-m-Y', strtotime($booking->arrival_date)) }}
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <div class="col-sm-4">{{ __('booking.departure_date') }}</div>
                        <div class="col-sm-8 fw-bold">
                            {{ date('d-m-Y', strtotime($booking->departure_date)) }}
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <div class="col-sm-4">{{ __('booking.number_of_days') }}</div>
                        <div class="col-sm-8 fw-bold">{{ $number_of_day }}</div>
                    </div>

                    <div class="mb-4 row">
                        <div class="col-sm-4">{{ __('booking.price_per_night') }}</div>
                        <div class="col-sm-8 fw-bold">
                            @if ($invoice)
                                {{ number_format($item_room_invoice->room_price, 2, '.', ' ') }}
                            @else
                                {{ number_format($booking->room->category->price, 2, '.', ' ') }}
                            @endif
                            {{ $deviseGest->iso_code }}
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <div class="col-sm-4">{{ __('booking.total_price') }}</div>
                        <div class="col-sm-8 fw-bold">
                            @if ($invoice)
                                {{ number_format($item_room_invoice->room_price * $number_of_day, 2, '.', ' ') }}
                            @else
                                {{ number_format($total_price, 2, '.', ' ') }}
                            @endif
                            {{ $deviseGest->iso_code }}
                        </div>
                    </div>

                    <div class="mb-4 border-bottom mb-4 fw-bold">
                        <div>{{ __('booking.other_services') }}</div>
                    </div>

                    <ul class="list-group mb-4">
                        @if ($invoice)
                            @foreach ($item_service_invoices as $item_service_invoice)
                                <li class="list-group-item">
                                    <span>
                                        {{ $item_service_invoice->name }} - {{ __('room.price') }} :
                                        {{ number_format($item_service_invoice->price, 2, '.', ' ') }}
                                        {{ $deviseGest->iso_code }}
                                    </span>
                                </li>
                            @endforeach
                        @else
                            @foreach ($service_assigns as $service_assign)
                                <li class="list-group-item">
                                    <span>
                                        {{ $service_assign->service->name }} - {{ __('room.price') }} :
                                        {{ number_format($service_assign->service->price, 2, '.', ' ') }}
                                        {{ $deviseGest->iso_code }}
                                    </span>
                                </li>

                            @endforeach
                        @endif

                        <li class="list-group-item bg-light fw-bold" aria-current="true">{{ __('booking.total_per_day') }} :
                            @if ($invoice)
                                {{ number_format($total_service_item, 2, '.', ' ') }}
                            @else
                                {{ number_format($total_service_assigns, 2, '.', ' ') }}
                            @endif
                             {{ $deviseGest->iso_code }}
                        </li>
                        <li class="list-group-item bg-light fw-bold" aria-current="true">
                            {{ $number_of_day <= 1 ? __('booking.total_for_day', ['day' => $number_of_day]) : __('booking.total_for_days', ['days' => $number_of_day]) }} :
                            @if ($invoice)
                                {{ number_format($total_service_item * $number_of_day, 2, '.', ' ') }}
                            @else
                                {{ number_format($total_service_assigns * $number_of_day, 2, '.', ' ') }}
                            @endif
                            {{ $deviseGest->iso_code }}
                        </li>
                    </ul>

                    <ul class="list-group mb-4">
                        <li class="list-group-item bg-success fw-bold text-white" aria-current="true">
                            Total :
                            @if ($invoice)
                                {{ number_format($invoice->price + $invoice->price_service_included, 2, '.', ' ') }}
                            @else
                                {{ number_format($total_services_included, 2, '.', ' ') }}
                            @endif
                             {{ $deviseGest->iso_code }}
                        </li>
                    </ul>

                    <input type="hidden" id="total_service_included" value="{{ number_format($total_services_included, 2, '.', ' ') }}">

                    <div class="border-bottom mb-4 fw-bold">
                        {{ __('invoice.payment_details') }}
                    </div>

                    <table class="table table-striped border mb-4">
                        <thead>
                            <th>Date</th>
                            <th>{{ __('payment_methods.collections') }}</th>
                            <th>{{ __('dashboard.payment_methods') }}</th>
                            <th class="text-end">{{ __('dashboard.amount') }} {{ $deviseGest->iso_code }}</th>
                        </thead>
                        <tbody>
                            @foreach ($encaissements as $encaissement)
                            <tr>
                                <td>{{ date('Y-m-d', strtotime($encaissement->created_at)) }}</td>
                                <td>{{ __($encaissement->description) }}</td>
                                <td>
                                    @if ($encaissement->default == 1)
                                        {{ __('payment_methods.' . $encaissement->designation) }} ({{ $encaissement->iso_code }})
                                    @else
                                        {{ $encaissement->designation }} ({{ $encaissement->iso_code }})
                                    @endif
                                </td>
                                <td class="text-end">{{ number_format($encaissement->amount, 2, '.', ' ') }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="fw-bold">{{ __('invoice.payment_received') }}</td>
                                <td></td>
                                <td></td>
                                <td class="fw-bold text-end">{{ number_format($paymentReceived, 2, '.', ' ') }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">{{ __('invoice.remaining_balance') }}</td>
                                <td></td>
                                <td></td>
                                <td class="fw-bold text-end">{{ number_format($remainingBalance, 2, '.', ' ') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    @if ($remainingBalance == 0)
                        <button class="btn btn-primary" type="role" disabled>
                            <i class="fa-solid fa-floppy-disk"></i>
                            {{ __('invoice.cash_in') }}
                        </button>
                    @else
                        <button class="btn btn-primary" type="role" data-bs-toggle="modal" data-bs-target="#cash-in">
                            <i class="fa-solid fa-floppy-disk"></i>
                            {{ __('invoice.cash_in') }}
                        </button>
                    @endif


                    @if ($invoice)
                        <a class="btn btn-primary" role="button" href="#" target="_blank">
                            <i class="fa-solid fa-print"></i>
                            {{ __('invoice.print') }}
                        </a>
                    @endif


                </div>
            </div>
        </section>

        <div class="m-5">
            @include('app.menu.footer-global')
        </div>

    </div>
</div>

{{-- start Modal --}}
<div class="modal fade" id="cash-in" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form class="modal-content" id="record_payment_invoice_form" action="{{ route('app_record_invoice_payment') }}" method="POST">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('invoice.record_a_payment') }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @csrf


            <input type="hidden" name="ref_invoice" id="ref_invoice" value="{{ $ref_invoice }}">
            <input type="hidden" name="id_booking" id="id_booking" value="{{ $booking->id }}">
            <input type="hidden" name="total_services" id="total_services" value="{{ number_format($total_service_assigns * $number_of_day, 2, '.', ' ') }}">
            <input type="hidden" name="total_price" id="total_price" value="{{ number_format($total_price, 2, '.', ' ') }}">

            <div class="mb-4 row">
                <label for="payment_methods_invoice_record" class="col-sm-4 col-form-label">{{ __('dashboard.payment_methods') }}*</label>
                <div class="col-sm-8">
                    <select class="form-select" name="payment_methods_invoice_record" id="payment_methods_invoice_record">
                        <option value="">{{ __('invoice.select_a_payment_method') }}</option>
                        @foreach ($paymentMethods as $paymentMethod)
                            <option value="{{ $paymentMethod->id }}">
                                @if ($paymentMethod->default == 1)
                                    {{ __('payment_methods.' . $paymentMethod->designation) }} ({{ $paymentMethod->iso_code }})
                                @else
                                    {{ $paymentMethod->designation }} ({{ $paymentMethod->iso_code }})
                                @endif
                            </option>
                        @endforeach
                    </select>
                    <small class="text-danger" id="payment_methods_invoice_record-error"></small>
                    <input type="hidden" id="payment_methods_invoice_record-error-message" name="payment_methods_invoice_record-error-message" value="{{ __('invoice.select_a_payment_method_please') }}">
                </div>
            </div>

            <div class="mb-4 row">
                <label for="amount_invoice_record" class="col-sm-4 col-form-label">{{ __('dashboard.amount') }}*</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <input type="number" step="0.01" name="amount_invoice_record" id="amount_invoice_record" class="form-control text-end" min="0" placeholder="0.00">
                        <span class="input-group-text" id="basic-addon2">{{ $deviseGest->iso_code }}</span>
                    </div>
                    <small class="text-danger" id="amount_invoice_record-error"></small>
                    <input type="hidden" id="amount_invoice_record-error-message" name="amount_invoice_record-error-message" value="{{ __('invoice.the_amount_to_be_collected_cannot_be_greater_than_the_remaining_balance') }}">
                    <input type="hidden" id="amount_invoice_record-error-message-empty" name="amount_invoice_record-error-message-empty" value="{{ __('invoice.amount_cannot_be_empty') }}">
                </div>
            </div>

        </div>
        <div class="modal-footer">
           {{-- button de fermeture modale --}}
           @include('app.button.close-button')

            <div class="d-grid gap-2">
                <button class="btn btn-primary saveP" type="button" type="button" id="record_payment_invoice" url="{{ route('app_check_records_amount_invoice') }}" token="{{ csrf_token() }}">
                    <i class="fa-solid fa-floppy-disk"></i>
                    {{ __('main.save') }}
                </button>
                <button class="btn btn-primary btn-loadingP d-none" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    {{ __('auth.loading') }}
                </button>
            </div>
        </div>
    </form>
    </div>
</div>
{{-- and Modal --}}

@endsection
