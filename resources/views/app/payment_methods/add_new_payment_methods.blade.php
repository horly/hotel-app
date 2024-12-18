@extends('app.base-app')
@section('title', __('payment_methods.add_a_new_payment_method'))
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
                        <h3>{{ __('payment_methods.add_a_new_payment_method') }}</h3>
                        <p class="text-subtitle text-muted"></p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav class="float-start float-lg-end" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ route('app_payment_methods') }}">{{ __('dashboard.payment_methods') }}</a></li>
                              <li class="breadcrumb-item active" aria-current="page">{{ __('payment_methods.add_a_new_payment_method') }}</li>
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
                        <form action="{{ route('app_create_payment_methods') }}" method="POST">
                            @csrf

                            {{--
                            <input type="hidden" name="id_entreprise" value="{{ $entreprise->id }}">
                            <input type="hidden" name="id_fu" value="{{ $functionalUnit->id }}">
                            --}}
                            <input type="hidden" name="id_payment_methods" value="0">
                            <input type="hidden" name="customerRequest" id="customerRequest" value="add">

                            <div class="mb-4 row">
                                <label for="designation_pay_meth" class="col-sm-4 col-form-label">{{ __('dashboard.designation') }}*</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('designation_pay_meth') is-invalid @enderror" id="designation_pay_meth" name="designation_pay_meth" placeholder="{{ __('payment_methods.enter_the_payment_method_designation') }}" value="{{ old('designation_pay_meth') }}">
                                    <small class="text-danger">@error('designation_pay_meth') {{ $message }} @enderror</small>
                                </div>
                            </div>

                            <div class="border-bottom mb-4 fw-bold">
                                {{ __('payment_methods.bank_information') }} ({{ __('payment_methods.if_bank') }})
                            </div>

                            <div class="mb-4 row">
                                <label for="instu_name_pay_meth" class="col-sm-4 col-form-label">{{ __('payment_methods.institution_name') }}</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('instu_name_pay_meth') is-invalid @enderror" id="instu_name_pay_meth" name="instu_name_pay_meth" placeholder="{{ __('payment_methods.enter_the_institution_name') }}" value="{{ old('instu_name_pay_meth') }}">
                                    <small class="text-danger">@error('instu_name_pay_meth') {{ $message }} @enderror</small>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="iban_pay_meth" class="col-sm-4 col-form-label">IBAN</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('iban_pay_meth') is-invalid @enderror" id="iban_pay_meth" name="iban_pay_meth" placeholder="{{ __('payment_methods.enter_the_iban') }}" value="{{ old('iban_pay_meth') }}">
                                    <small class="text-danger">@error('iban_pay_meth') {{ $message }} @enderror</small>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="account_number_pay_meth" class="col-sm-4 col-form-label">{{ __('entreprise.account_number') }}</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('account_number_pay_meth') is-invalid @enderror" id="account_number_pay_meth" name="account_number_pay_meth" placeholder="{{ __('client.enter_the_account_number') }}" value="{{ old('account_number_pay_meth') }}">
                                    <small class="text-danger">@error('account_number_pay_meth') {{ $message }} @enderror</small>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="devise_pay_meth" class="col-sm-4 col-form-label">{{ __('dashboard.currency') }}</label>
                                <div class="col-sm-5">
                                    <select class="form-select" name="devise_pay_meth" id="devise_pay_meth" name="devise_pay_meth">
                                        @if (Config::get('app.locale') == 'en')
                                            <option value="{{ $deviseDefault->id }}" selected>{{ $deviseDefault->iso_code }} - {{ $deviseDefault->motto_en }}</option>
                                            @foreach ($deviseGests as $devise)
                                                <option value="{{ $devise->id }}">{{ $devise->iso_code }} - {{ $devise->motto_en }}</option>
                                            @endforeach
                                        @else
                                            <option value="{{ $deviseDefault->id }}" selected>{{ $deviseDefault->iso_code }} - {{ $deviseDefault->motto }}</option>
                                            @foreach ($deviseGests as $devise)
                                                <option value="{{ $devise->id }}">{{ $devise->iso_code }} - {{ $devise->motto }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <small class="text-danger">@error('devise_pay_meth') {{ $message }} @enderror</small>
                                </div>

                                <div class="col-sm-3 d-grid gap-2">
                                    <a href="{{ route('app_create_currency', ['id' => 0]) }}" class="btn btn-primary mb-3" role="button">
                                        <i class="fa-solid fa-circle-plus"></i>
                                        &nbsp;{{ __('auth.add') }}
                                    </a>
                                </div>

                            </div>

                            <div class="mb-4 row">
                                <label for="bic_swift_pay_meth" class="col-sm-4 col-form-label">BIC/Swift code</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('bic_swift_pay_meth') is-invalid @enderror" id="bic_swift_pay_meth" name="bic_swift_pay_meth" placeholder="{{ __('payment_methods.enter_the_bic_swift_code') }}" value="{{ old('bic_swift_pay_meth') }}">
                                    <small class="text-danger">@error('bic_swift_pay_meth') {{ $message }} @enderror</small>
                                </div>
                            </div>


                            <div class="border-bottom mb-4"></div>
                            {{-- button de sauvegarde --}}
                            @include('app.button.save-button')


                        </form>
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
