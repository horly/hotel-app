@extends('app.base-app')
@section('title', __('dashboard.dashboard'))
@section('content')

<div id="app">

    @include('app.menu.navigation-menu')

    @include('app.menu.login-nav')

</div>

@endsection
