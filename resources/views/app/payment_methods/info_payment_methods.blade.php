@extends('app.base-app')
@section('title', __('payment_methods.payment_method_details'))
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
                        <h3>{{ __('payment_methods.payment_method_details') }}</h3>
                        <p class="text-subtitle text-muted"></p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav class="float-start float-lg-end" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ route('app_payment_methods') }}">{{ __('dashboard.payment_methods') }}</a></li>
                              <li class="breadcrumb-item active" aria-current="page">{{ __('payment_methods.payment_method_details') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            {{-- On inlut les messages flash--}}
            @include('app.message.flash-message')

            <section class="section">
                <div class="card">
                    <div class="card-body">

                        <div class="row mb-4">
                            <div class="col-md-4">
                                {{ __('dashboard.designation') }}
                            </div>
                            <div class="col-md-8 text-primary fw-bold">
                                @if ($paymentMethod->default == 1)
                                    {{ __('payment_methods.' . $paymentMethod->designation) }}
                                @else
                                    {{ ($paymentMethod->designation) }}
                                @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-4">
                                {{ __('payment_methods.collections') }}
                            </div>
                            <div class="col-md-8 text-primary fw-bold">
                                {{ number_format($paymentReceived, 2, '.', ' ') }} {{ $paymentMethod->iso_code }}
                            </div>
                        </div>

                        <div class="border-bottom mb-4 fw-bold">
                            {{ __('payment_methods.bank_information') }} ({{ __('payment_methods.if_bank') }})
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-4">
                                {{ __('payment_methods.institution_name') }}
                            </div>
                            <div class="col-md-8 text-primary fw-bold">
                                {{ $paymentMethod->institution_name }}
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-4">
                                IBAN
                            </div>
                            <div class="col-md-8 text-primary fw-bold">
                                {{ $paymentMethod->iban }}
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-4">
                                {{ __('entreprise.account_number') }}
                            </div>
                            <div class="col-md-8 text-primary fw-bold">
                                {{ $paymentMethod->account_number }}
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-4">
                                {{ __('dashboard.currency') }}
                            </div>
                            <div class="col-md-8 text-primary fw-bold">
                                {{ $paymentMethod->iso_code }}
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-4">
                                BIC/Swift code
                            </div>
                            <div class="col-md-8 text-primary fw-bold">
                                {{ $paymentMethod->bic_swiff }}
                            </div>
                        </div>

                        <div class="border-bottom mb-4 fw-bold">
                            {{ __('payment_methods.collections') }}
                        </div>

                        <table class="table table-striped table-hover border bootstrap-datatable">
                            <thead>
                                <th>N°</th>
                                <th>Date</th>
                                <th>{{ __('client.reference') }}</th>
                                <th>{{ __('article.description') }}</th>
                                <th class="text-end">{{ __('dashboard.amount') }} {{ $paymentMethod->iso_code }}</th>
                            </thead>
                            <tbody>
                                @foreach ($encaissements as $encaissement)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('Y-m-d', strtotime($encaissement->created_at)) }}</td>
                                        <td>{{ $encaissement->reference_enc }}</td>
                                        <td>{{ __($encaissement->description) }}</td>
                                        <td class="text-end">
                                            {{ number_format($encaissement->amount, 2, '.', ' ') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="border-bottom mb-4 mt-4"></div>

                        @if ($paymentMethod->default != 1)
                            <a class="btn btn-success" role="button" href="{{ route('app_update_payment_methods', [
                                'id' => $paymentMethod->id]) }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                                {{ __('entreprise.edit') }}
                            </a>
                        @else
                            <button class="btn btn-success" type="button" disabled>
                                <i class="fa-solid fa-pen-to-square"></i>
                                {{ __('entreprise.edit') }}
                            </button>
                        @endif

                        @if ($paymentMethod->default != 1 && !$encaissement_exit)
                            <button class="btn btn-danger" type="button" onclick="" title="{{ __('entreprise.delete') }}">
                                <i class="fa-solid fa-trash-can"></i>
                                {{ __('entreprise.delete') }}
                            </button>
                        @else
                            <button class="btn btn-danger" type="button" title="{{ __('entreprise.delete') }}" disabled>
                                <i class="fa-solid fa-trash-can"></i>
                                {{ __('entreprise.delete') }}
                            </button>
                        @endif

                    </div>
                </div>
            </section>

            <div class="m-5">
                @include('app.menu.footer-global')
            </div>

        </div>
    </div>
</div>

@endsection
