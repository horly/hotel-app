@extends('app.base-app')
@section('title', __('room.add_room'))
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
                        <h3>{{ __('room.add_room') }}</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav class="float-start float-lg-end" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ route('app_rooms') }}">{{ __('room.room') }}</a></li>
                              <li class="breadcrumb-item active" aria-current="page">{{ __('room.add_room') }}</li>
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
                    <form action="{{ route('app_save_room') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_room" value="{{ $id_room }}">
                        <input type="hidden" name="customerRequest" id="customerRequest" value="{{ ($id_room == 0) ? 'add' : 'edit' }}">


                        <div class="mb-4 row">
                            <label for="room_number" class="col-sm-4 col-form-label">{{ __('room.room_number') }}*</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('room_number') is-invalid @enderror" id="room_number" name="room_number" placeholder="{{ __('room.enter_the_room_number') }}" value="{{ ($id_room == 0) ? old('room_number') : $room->room_number }}">
                                <small class="text-danger">@error('room_number') {{ $message }} @enderror</small>
                            </div>
                        </div>



                        <div class="mb-4 row">
                            <label for="room_category" class="col-sm-4 col-form-label">{{ __('room.room_category') }}*</label>
                            <div class="col-sm-8">
                                <select name="room_category" id="room_category" class="form-select @error('room_category') is-invalid @enderror">

                                    @if ($id_room == 0)
                                        <option value="" selected>{{ __('room.select_a_room_category') }}</option>
                                    @else
                                        <option value="{{ $room->id_cat }}" selected>
                                            {{ $room_category->description }}
                                        </option>
                                    @endif

                                    @foreach ($room_categories as $room_cat)
                                        <option value="{{ $room_cat->id }}">
                                            {{ $room_cat->description }}
                                        </option>
                                    @endforeach

                                </select>
                                <small class="text-danger">@error('room_category') {{ $message }} @enderror</small>
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
