@extends('app.base-app')
@section('title', __('room.add_room_category'))
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
                        <h3>{{ __('room.add_room_category') }}</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav class="float-start float-lg-end" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ route('app_room_category') }}">{{ __('room.room_category') }}</a></li>
                              <li class="breadcrumb-item active" aria-current="page">{{ __('room.add_room_category') }}</li>
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
                    <form action="{{ route('app_save_room_category') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_room_cat" value="{{ $id_room_cat }}">
                        <input type="hidden" name="customerRequest" id="customerRequest" value="{{ ($id_room_cat == 0) ? 'add' : 'edit' }}">

                        <div class="mb-4 row">
                            <label for="descriptionRoomCat" class="col-sm-4 col-form-label">{{ __('article.description') }}*</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('descriptionRoomCat') is-invalid @enderror" id="descriptionRoomCat" name="descriptionRoomCat" placeholder="{{ __('room.enter_the_category_description') }}" value="{{ ($id_room_cat == 0) ? old('descriptionRoomCat') : $room_category->description }}">
                                <small class="text-danger">@error('descriptionRoomCat') {{ $message }} @enderror</small>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="room_cat_price" class="col-sm-4 col-form-label">{{ __('room.price') }}*</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="number" step="0.01" class="form-control text-end @error('room_cat_price') is-invalid @enderror" id="room_cat_price" name="room_cat_price" placeholder="0.00" value="{{ ($id_room_cat == 0) ? old('room_cat_price') : $room_category->price }}">
                                    <span class="input-group-text">{{ $deviseGest->iso_code }}</span>
                                </div>
                                <small class="text-danger">@error('room_cat_price') {{ $message }} @enderror</small>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="room_cat_number_of_people" class="col-sm-4 col-form-label">{{ __('room.number_of_people') }}*</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control text-end @error('room_cat_number_of_people') is-invalid @enderror" id="room_cat_number_of_people" name="room_cat_number_of_people" placeholder="0" value="{{ ($id_room_cat == 0) ? old('room_cat_number_of_people') : $room_category->people_number }}">
                                <small class="text-danger">@error('room_cat_number_of_people') {{ $message }} @enderror</small>
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
