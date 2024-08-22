@extends('app.base-app')
@section('title', __('profile.profile'))
@section('content')

@include('app.menu.login-nav')

<div class="container mt-5">

     {{-- On inlut les messages flash--}}
     @include('app.message.flash-message')

   <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('app_dashboard') }}">{{ __('dashboard.dashboard') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ __('profile.profile_information') }}</li>
        </ol>
    </nav>

   <div class="card">
        <div class="card-body">
            {{--
                <div class="border-bottom p-4">
                    @include('profile.profile-tab')
                </div>
            --}}

            <div class="p-4" id="myTabContent">

                @include('app.profile.profile-info')

            </div>
        </div>

   </div>

   <div class="m-5">
       @include('app.menu.footer-global')
   </div>
</div>


@endsection
