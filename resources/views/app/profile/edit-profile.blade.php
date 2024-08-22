@extends('app.base-app')
@section('title', __('profile.edit_profile_info'))
@section('content')

@include('app.menu.login-nav')

<div class="d-flex align-items-center mt-5">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('app_dashboard') }}">{{ __('dashboard.dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('profile.edit_profile_info') }}</li>
            </ol>
        </nav>

        <form class="card" action="{{ route('app_save_profile_info') }}" method="POST">
            @csrf

            <div class="card-body">
                <div class="mb-4 row">
                    <label for="name_profile" class="col-sm-4 col-form-label">{{ __('main.name') }}*</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                            <input type="text" class="form-control @error('name_profile') is-invalid @enderror" name="name_profile" id="name_profile" value="{{ Auth::user()->name }}">
                        </div>
                        <small class="text-danger">@error('name_profile'){{ $message }}@enderror</small>
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="phone_number_profile" class="col-sm-4 col-form-label">{{ __('main.phone_number') }}*</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone"></i></span>
                            <input type="number" class="form-control @error('phone_number_profile') is-invalid @enderror" name="phone_number_profile" id="phone_number_profile" value="{{ Auth::user()->phone_number }}">
                        </div>
                        <small class="text-danger">@error('phone_number_profile'){{ $message }}@enderror</small>
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="address_profile" class="col-sm-4 col-form-label">{{ __('main.address') }}*</label>
                    <div class="col-md-8">
                        <textarea name="address_profile" class="form-control @error('address_profile') is-invalid @enderror" id="address_profile" rows="5">{{ Auth::user()->address }}</textarea>
                    </div>
                </div>

                @include('app.button.save-button')
            </div>

        </form>

    </div>
</div>

<div class="m-5">
    @include('app.menu.footer-global')
</div>

@endsection
