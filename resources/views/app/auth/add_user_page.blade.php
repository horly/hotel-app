@extends('base')
@section('title', __('main.add_user'))
@section('content')

@include('menu.login-nav')

<div class="d-flex align-items-center container-margin-top">
    <div class="container">

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('app_user_management') }}">{{ __('main.user_management') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('main.add_user') }}</li>
            </ol>
        </nav>

        <form id="form-register" class="card bg-body-tertiary" action="{{ route('app_add_user') }}" method="post" token={{ csrf_token() }}>
            @csrf

            <div class="card-body">

                <div class="mb-4 row">
                    <label for="firstName" class="col-sm-4 col-form-label">{{ __('auth.first_name')}} *</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                            <input type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" id="firstName" placeholder="{{ __('auth.enter_the_firstname') }}" value="{{ old('firstName') }}">
                        </div>
                        <small class="text-danger">@error('firstName'){{ $message }}@enderror</small>
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="lastName" class="col-sm-4 col-form-label">{{ __('auth.last_name')}} *</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                            <input type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" id="lastName" placeholder="{{ __('auth.enter_the_lastname') }}" value="{{ old('lastName') }}">
                        </div>
                        <small class="text-danger">@error('lastName'){{ $message }}@enderror</small>
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="emailUsr" class="col-sm-4 col-form-label">{{ __('auth.email')}} *</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" class="form-control @error('emailUsr') is-invalid @enderror" name="emailUsr" id="emailUsr" placeholder="{{ __('auth.enter_the_email') }}" value="{{ old('emailUsr') }}">
                        </div>
                        <small class="text-danger">@error('emailUsr'){{ $message }}@enderror</small>
                    </div>
                </div>

                {{--

                <div class="col-md-6 mb-4">
                    <label for="passwordUsr" class="form-label">{{ __('auth.password')}} *</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" name="passwordUsr" id="passwordUsr" class="form-control @error('passwordUsr') is-invalid @enderror" placeholder="{{ __('auth.create_your_password') }}" value="{{ old('passwordUsr') }}">
                        <span class="input-group-text cursor-pointer" id="show-password"><i class="fa-solid fa-eye"></i></span>
                        <span class="input-group-text cursor-pointer d-none" id="hide-password"><i class="fa-solid fa-eye-slash"></i></span>
                    </div>
                    <small class="text-danger">@error('passwordUsr'){{ $message }}@enderror</small>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="passwordConfirm" class="form-label">{{ __('auth.password_confirmation')}} *</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control @error('passwordConfirm') is-invalid @enderror" placeholder="{{ __('auth.confirm_your_password') }}" value="{{ old('passwordConfirm') }}">
                        <span class="input-group-text cursor-pointer" id="show-password-confirm"><i class="fa-solid fa-eye"></i></span>
                        <span class="input-group-text cursor-pointer d-none" id="hide-password-confirm"><i class="fa-solid fa-eye-slash"></i></span>
                    </div>
                    <small class="text-danger">@error('passwordConfirm'){{ $message }}@enderror</small>
                </div>

                --}}

                <div class="mb-4 row">
                    <label for="role" class="col-sm-4 form-label">{{ __('auth.role') }} *</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-universal-access"></i></span>
                            <select class="form-select @error('role') is-invalid @enderror" id="role" name="role">
                                <option value="" selected>{{ __('main.choose') }}...</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ __('main.' . $role->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <small class="text-danger">@error('role'){{ $message }}@enderror</small>
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="function" class="col-sm-4 form-label">{{ __('main.function') }} *</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-briefcase"></i></span>
                            <select class="form-select @error('function') is-invalid @enderror" id="function" name="function">
                                <option value="" selected>{{ __('main.choose') }}...</option>
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <small class="text-danger">@error('function'){{ $message }}@enderror</small>
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="countryUsr" class="col-sm-4 col-form-label">{{ __('auth.country') }}*</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-earth-africa"></i></span>
                            <select class="form-select country-select @error('countryUsr') is-invalid @enderror" id="country_profile" name="countryUsr">
                                <option iso-code="" value="" selected>{{ __('auth.select_the_country') }}</option>
                                @if (Config::get('app.locale') == 'en')
                                    @foreach ($countries_gb as $country)
                                        <option iso-code="{{ $country->telephone_code }}" value="{{ $country->id }}">{{ $country->name_gb }} (+{{ $country->telephone_code }})</option>
                                    @endforeach
                                @else
                                    @foreach ($countries_fr as $country)
                                        <option iso-code="{{ $country->telephone_code }}" value="{{ $country->id }}">{{ $country->name_fr }} (+{{ $country->telephone_code }})</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <small class="text-danger">@error('countryUsr'){{ $message }}@enderror</small>
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="phoneNumber" class="col-sm-4 col-form-label">{{ __('main.phone_number') }}*</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone"></i></span>
                            <span class="input-group-text">
                                +<span class="country-code-label"></span>
                            </span>
                            <input type="number" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" id="phoneNumber" placeholder="{{ __('auth.enter_the_phone_number') }}" value="{{ old('phoneNumber') }}">
                        </div>
                        <small class="text-danger">@error('phoneNumber'){{ $message }}@enderror</small>
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="matricule" class="col-sm-4 col-form-label">{{ __('main.registration_number') }}*</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-barcode"></i></span>
                            <input type="text" class="form-control @error('matricule') is-invalid @enderror" name="matricule" id="matricule" placeholder="{{ __('main.enter_the_registration_number')}}" value="{{ old('matricule') }}">
                        </div>
                        <small class="text-danger">@error('matricule'){{ $message }}@enderror</small>
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="address" class="col-sm-4 col-form-label">{{ __('main.address') }}*</label>
                    <div class="col-md-8">
                        <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="address" rows="5" placeholder="{{ __('auth.enter_the_address') }}"></textarea>
                    </div>
                </div>

                {{-- Button ajout --}}
                @include('button.add-button')
            </div>
        </form>
 
    </div>
</div>

<div class="m-5">
    @include('menu.footer-global')
</div>


@endsection
