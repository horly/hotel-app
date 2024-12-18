@extends('app.base-app')
@section('title', __('service.add_a_new_service'))
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
                        <h3>{{ __('service.add_a_new_service') }}</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav class="float-start float-lg-end" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ route('app_services') }}">Services</a></li>
                              <li class="breadcrumb-item active" aria-current="page">{{ __('service.add_a_new_service') }}</li>
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
                    <form action="{{ route('app_save_service') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_service" value="{{ $id_service }}">
                        <input type="hidden" name="reference" value="{{ $reference }}">
                        <input type="hidden" name="refNum" value="{{ $refNum }}">
                        <input type="hidden" name="customerRequest" id="customerRequest" value="{{ ($id_service == 0) ? 'add' : 'edit' }}">

                        <div class="mb-4 row">
                            <div class="col-sm-4">{{ __('client.reference') }}</div>
                            <div class="col-sm-8">{{ $reference }}</div>
                        </div>

                        <div class="mb-4 row">
                            <label for="service_name" class="col-sm-4 col-form-label">{{ __('service.service_name') }}*</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('service_name') is-invalid @enderror" id="service_name" name="service_name" placeholder="{{ __('service.enter_the_service_name') }}" value="{{ ($id_service == 0) ? old('service_name') : $service->name }}">
                                <small class="text-danger">@error('service_name') {{ $message }} @enderror</small>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="service_descpt" class="col-sm-4 col-form-label">{{ __('article.description') }}*</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('service_descpt') is-invalid @enderror" id="service_descpt" name="service_descpt" placeholder="{{ __('service.enter_the_service_description') }}" value="{{ ($id_service == 0) ? old('service_descpt') : $service->description }}">
                                <small class="text-danger">@error('service_descpt') {{ $message }} @enderror</small>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="service_price" class="col-sm-4 col-form-label">{{ __('room.price') }}*</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="number" step="0.01" class="form-control text-end @error('service_price') is-invalid @enderror" id="service_price" name="service_price" placeholder="0.00" value="{{ ($id_service == 0) ? old('service_price') : $service->price }}">
                                    <span class="input-group-text">{{ $deviseGest->iso_code }}</span>
                                </div>
                                <small class="text-danger">@error('service_price') {{ $message }} @enderror</small>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 mx-auto">
                                @include('app.button.save-button')
                            </div>
                        </div>

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
