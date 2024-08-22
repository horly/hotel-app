@extends('app.base-app')
@section('title', __('auth.register'))
@section('content')

<div class="vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">

                @include('app.global.logo')

                <p class="text-muted text-center h5 mb-5"> {{ __('auth.register') }}</p>

                <div class="d-flex justify-content-end mb-3">
                    @include('app.button.language-dropdown')
                </div>

                <form id="form-register" class="card bg-body-tertiary" action="{{ route('register') }}" method="post" token={{ csrf_token() }}>
                    @csrf

                    <div class="card-body">

                        <div class="mb-4 row">
                            <label for="firstName" class="col-sm-4 col-form-label">{{ __('auth.first_name')}} *</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                                    <input type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" id="firstName" placeholder="{{ __('auth.enter_the_firstname') }}" value="{{ old('firstName') }}">
                                </div>
                                <small class="text-danger">@error('firstName'){{ __('auth.enter_a_valid_firstname_please') }}@enderror</small>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="lastName" class="col-sm-4 col-form-label">{{ __('auth.last_name')}} *</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                                    <input type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" id="lastName" placeholder="{{ __('auth.enter_the_lastname') }}" value="{{ old('lastName') }}">
                                </div>
                                <small class="text-danger">@error('lastName'){{ __('auth.enter_a_valid_lastname_please') }}@enderror</small>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="email" class="col-sm-4 col-form-label">{{ __('auth.email')}} *</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="emailUsr" placeholder="{{ __('auth.enter_the_email') }}" value="{{ old('email') }}">
                                </div>
                                <small class="text-danger">@error('email'){{ __('auth.enter_a_valid_email_please') }}@enderror</small>
                            </div>
                        </div>



                        <div class="row mb-4">
                            <label for="password" class="col-sm-4 col-form-label">{{ __('auth.password')}} *</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('auth.create_your_password') }}" value="{{ old('password') }}">
                                    <span class="input-group-text cursor-pointer" id="show-password"><i class="fa-solid fa-eye"></i></span>
                                    <span class="input-group-text cursor-pointer d-none" id="hide-password"><i class="fa-solid fa-eye-slash"></i></span>
                                </div>
                                <small class="text-danger">@error('password'){{ __('auth.the_password_field_must_be_8') }}@enderror</small>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label for="password_confirmation" class="col-sm-4 col-form-label">{{ __('auth.password_confirmation')}} *</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="{{ __('auth.confirm_your_password') }}" value="{{ old('password_confirmation') }}">
                                    <span class="input-group-text cursor-pointer" id="show-password-confirm"><i class="fa-solid fa-eye"></i></span>
                                    <span class="input-group-text cursor-pointer d-none" id="hide-password-confirm"><i class="fa-solid fa-eye-slash"></i></span>
                                </div>
                                <small class="text-danger">@error('password_confirmation'){{ __('auth.error_confirm_new_password_message_profile') }}@enderror</small>
                            </div>
                        </div>


                        {{--
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
                        --}}

                        {{--
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
                        --}}

                        {{-- Button ajout --}}
                        @include('app.button.add-button')
                    </div>
                </form>

                <div class="m-5">
                    @include('app.menu.footer-global')
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
