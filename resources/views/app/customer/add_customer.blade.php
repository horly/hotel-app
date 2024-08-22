@extends('app.base-app')
@section('title', __('client.add_a_new_customer'))
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
                        <h3>{{ __('client.add_a_new_customer') }}</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav class="float-start float-lg-end" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ route('app_customers') }}">{{ __('dashboard.customer') }}</a></li>
                              <li class="breadcrumb-item active" aria-current="page">{{ __('client.add_a_new_customer') }}</li>
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
                    <form action="{{ route('app_save_customer') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_customer" value="{{ $id_customer }}">
                        <input type="hidden" name="reference" value="{{ $reference }}">
                        <input type="hidden" name="refNum" value="{{ $refNum }}">
                        <input type="hidden" name="customerRequest" id="customerRequest" value="{{ ($id_customer == 0) ? 'add' : 'edit' }}">

                        <div class="mb-4 row">
                            <div class="col-sm-4">{{ __('client.reference') }}</div>
                            <div class="col-sm-8">{{ $reference }}</div>
                        </div>

                        <div class="mb-4 row">
                            <label for="firstNameCust" class="col-sm-4 col-form-label">{{ __('auth.first_name') }}*</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('firstNameCust') is-invalid @enderror" id="firstNameCust" name="firstNameCust" placeholder="{{ __('client.enter_customer_firstname') }}" value="{{ ($id_customer == 0) ? old('firstNameCust') : $customer->firtName }}">
                                <small class="text-danger">@error('firstNameCust') {{ $message }} @enderror</small>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="lastNameCust" class="col-sm-4 col-form-label">{{ __('auth.last_name') }}*</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('lastNameCust') is-invalid @enderror" id="lastNameCust" name="lastNameCust" placeholder="{{ __('client.enter_customer_lastname') }}" value="{{ ($id_customer == 0) ? old('lastNameCust') : $customer->lastName }}">
                                <small class="text-danger">@error('lastNameCust') {{ $message }} @enderror</small>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="emailCust" class="col-sm-4 col-form-label">{{ __('auth.email') }}*</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control @error('emailCust') is-invalid @enderror" id="emailCust" name="emailCust" placeholder="{{ __('client.enter_customer_email_address') }}" value="{{ ($id_customer == 0) ? old('emailCust') : $customer->emailAddr }}">
                                <small class="text-danger">@error('emailCust') {{ $message }} @enderror</small>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="phoneCust" class="col-sm-4 col-form-label">{{ __('main.phone_number') }}*</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control @error('phoneCust') is-invalid @enderror" id="phoneCust" name="phoneCust" placeholder="{{ __('client.enter_customer_phone_number') }}" value="{{ ($id_customer == 0) ? old('phoneCust') : $customer->phoneNumber }}">
                                <small class="text-danger">@error('phoneCust') {{ $message }} @enderror</small>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="addressCust" class="col-sm-4 col-form-label">{{ __('main.address') }}</label>
                            <div class="col-sm-8">
                              <textarea class="form-control  @error('addressCust') is-invalid @enderror" name="addressCust" id="addressCust" rows="4" placeholder="{{ __('client.enter_customer_address') }}">{{ ($id_customer == 0) ? old('addressCust') : $customer->address }}</textarea>
                              <small class="text-danger">@error('addressCust') {{ $message }} @enderror</small>
                            </div>
                        </div>

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

@endsection
