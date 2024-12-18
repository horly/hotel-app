@extends('app.base-app')
@section('title', __('dashboard.add_currency'))
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
                        <h3>{{ __('dashboard.add_currency') }}</h3>
                        <p class="text-subtitle text-muted"></p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav class="float-start float-lg-end" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ route('app_currency') }}">{{ __('dashboard.currencies') }}</a></li>
                              <li class="breadcrumb-item active" aria-current="page">{{ __('dashboard.add_currency') }}</li>
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
                    <form action="{{ route('app_save_currency') }}" method="POST">
                        @csrf

                        <input type="hidden" name="id_currency_gest" value="{{ ($devise) ? $devise->id : 0 }}">
                        <input type="hidden" name="fuRequest" id="fuRequest" value="{{ ($devise) ? "edit" : "add" }}">

                        <div class="mb-4 row">
                            <label for="currency_name_dev" class="col-sm-4 col-form-label">{{ __('dashboard.currency_name') }}*</label>
                            <div class="col-sm-8">
                              <select name="currency_name_dev" id="currency_name_dev" class="form-select @error('currency_name_dev') is-invalid @enderror">
                                    @if ($devise)
                                        @if (Config::get('app.locale') == 'en')
                                            <option devise="{{ $devise->iso_code }}" value="{{ $devise->id }}">{{ $devise->iso_code }} - {{ $devise->motto_en }}</option>
                                        @else
                                            <option devise="{{ $devise->iso_code }}" value="{{ $devise->id }}">{{ $devise->iso_code }} - {{ $devise->motto }}</option>
                                        @endif
                                    @else
                                        <option value="" selected>{{ __('entreprise.select_your_curreny') }}</option>
                                    @endif

                                        @if (Config::get('app.locale') == 'en')
                                            @foreach ($devises as $devise)
                                                <option devise="{{ $devise->iso_code }}" value="{{ $devise->id }}">{{ $devise->iso_code }} - {{ $devise->motto_en }}</option>
                                            @endforeach
                                        @else
                                            @foreach ($devises as $devise)
                                                <option devise="{{ $devise->iso_code }}" value="{{ $devise->id }}">{{ $devise->iso_code }} - {{ $devise->motto }}</option>
                                            @endforeach
                                        @endif
                              </select>
                              <small class="text-danger">@error('currency_name_dev') {{ $message }} @enderror</small>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="rate_currency_dev" class="col-sm-4 col-form-label">{{ __('dashboard.rate') }}*</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        @if ($deviseGest)
                                            {{ $deviseGest->taux }} {{ $deviseGest->iso_code }}
                                        @else
                                            1
                                        @endif
                                         =
                                    </span>
                                    <input type="number" step="0.01" class="form-control text-end @error('rate_currency_dev') is-invalid @enderror" id="rate_currency_dev" name="rate_currency_dev" placeholder="0.00" value="{{ ($dev) ? $dev->taux : old('rate_currency_dev') }}">
                                    <span class="input-group-text" id="currency_selected_dev">{{ ($dev) ? $dev->iso_code	 : "" }}</span>
                                </div>
                                <small class="text-danger">@error('rate_currency_dev') {{ $message }} @enderror</small>
                            </div>
                        </div>

                        {{-- button de sauvegarde --}}
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
