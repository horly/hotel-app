@extends('app.base-app')
@section('title', 'Services')
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
                        <h3>Services</h3>
                        <p class="text-subtitle text-muted">{{ __('service.service_list') }}</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav class="float-start float-lg-end" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ route('app_dashboard') }}">{{ __('dashboard.dashboard') }}</a></li>
                              <li class="breadcrumb-item active" aria-current="page">{{ __('service.service_list') }}</li>
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
                    <a href="{{ route('app_add_services', ['id' => 0]) }}" class="btn btn-primary mb-3" role="button">
                        <i class="fa-solid fa-circle-plus"></i>
                        &nbsp;{{ __('auth.add') }}
                    </a>

                    <table class="table table-striped table-hover border bootstrap-datatable">
                        <thead>
                            <th>N°</th>
                            <th>{{ __('client.reference') }}</th>
                            <th>{{ __('service.service_name') }}</th>
                            <th>{{ __('article.description') }}</th>
                            <th class="text-end">{{ __('room.price') }} {{ $deviseGest->iso_code }}</th>
                            <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ route('app_add_services', [ 'id'=> $service->id ]) }}">
                                            {{ $service->reference_service }}
                                        </a>
                                    </td>
                                    <td>{{ $service->name }}</td>
                                    <td>{{ $service->description }}</td>
                                    <td class="text-end">{{ number_format($service->price, 2, '.', ' ') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('app_add_services', [ 'id'=> $service->id ]) }}">
                                            {{ __('main.show') }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </section>

        <div class="m-5">
            @include('app.menu.footer-global')
        </div>


    </div>

</div>

@endsection