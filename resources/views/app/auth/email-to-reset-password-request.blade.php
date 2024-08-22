@extends('app.base-app')
@section('title', __('auth.forgot_password'))
@section('content')

<div class="vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                @include('app.global.logo')

                <p class="text-muted text-center h5 mb-5"> {{ __('auth.forgot_password') }}</p>

                <div class="d-flex justify-content-end mb-3">
                    @include('app.button.language-dropdown')
                </div>

                <form class="card" method="post" action="{{ route('app_email_reset_password_post') }}">
                    @csrf

                    <div class="card-body bg-body-tertiary p-5">
                        <div class="alert alert-primary text-center" role="alert">
                            <div><i class="fa-solid fa-circle-info"></i></div>
                            {{ __('auth.provide_your_email_and_we_will') }}</b>
                        </div>

                         {{-- Message de session--}}
                         @include('app.message.flash-message')

                        <label for="emailPassReq" class="form-label">{{ __('auth.email')}}</label>
                        <div class="mb-4">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                                <input type="email" name="emailPassReq" id="emailPassReq" class="form-control @error('emailPassReq') is-invalid @enderror" placeholder="{{ __('auth.enter_your_email') }}" value="{{ old('emailPassReq') }}">
                            </div>
                            <small class="text-danger">@error('emailPassReq'){{ $message }}@enderror</small>
                        </div>

                        @include('app.button.send-button')

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
