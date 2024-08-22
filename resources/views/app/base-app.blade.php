<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }} - @yield('title')</title>

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/app/css/style.css') }}">
    </head>
    <body>
        {{-- Tout nos contenues seront affiché ici --}}
        @yield('content')

        {{-- Datatable --}}
        @include('app.datatable.datatable')

        {{--Sweet alerte delete--}}
        @include('app.global.delete-sweet-alert')

        {{-- Lib js include --}}
        {{-- Bootstrap need proper --}}
        <script src="{{ asset('assets/lib/proper/proper.js') }}"></script>
        <script src="{{ asset('assets/lib/bootstrap/js/bootstrap.js') }}"></script>
        <script src="{{ asset('assets/lib/jquery/jquery.js') }}"></script>
        <script src="{{ asset('assets/lib/sweet-alert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/lib/DataTables/datatables.js') }}"></script>
        <script src="{{ asset('assets/lib/select2/select2.min.js') }}"></script>
        <script src="{{ asset('assets/lib/jqueryForm/jqueryForm.min.js') }}"></script>

        @if (Request::route()->getName() == "app_profile")
            <script src="{{ asset('assets/lib/cropper/js/cropper.js') }}"></script>
            <script src="{{ asset('assets/lib/cropper/js/cropper-init.js') }}"></script>
        @endif

        {{-- Thèmes --}}
        <script src="{{ asset('assets/lib/theme/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

        <script src="{{ asset('assets/lib/theme/js/main.js') }}"></script>



        {{-- Les pages --}}
        <script src="{{ asset('assets/app/js/script.js') }}"></script>
        <script src="{{ asset('assets/app/js/register.js') }}"></script>
        <script src="{{ asset('assets/app/js/main.js') }}"></script>
        <script src="{{ asset('assets/app/js/dataTables-init.js') }}"></script>

    </body>
</html>
