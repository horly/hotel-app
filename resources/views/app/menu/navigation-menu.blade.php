<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('app_dashboard') }}"><img src="{{ asset('assets/img/logo/logo.png') }}" style="height: 100px!important" height="100" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item @if(Request::route()->getName() == "app_dashboard")
                                                active
                                        @endif">
                    <a href="{{ route('app_dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>{{ __('dashboard.dashboard') }}</span>
                    </a>
                </li>

                <li class="sidebar-item  @if(Request::route()->getName() == "app_customers" ||
                                                Request::route()->getName() == "app_add_customer")
                                                active
                                        @endif">
                    <a href="{{ route('app_customers') }}" class='sidebar-link'>
                        <i class="fas fa-user"></i>
                        <span>{{ __('client.customers') }}</span>
                    </a>
                </li>

                <li class="sidebar-item  @if(Request::route()->getName() == "app_room_category" ||
                                                Request::route()->getName() == "app_rooms" ||
                                                Request::route()->getName() == "app_add_room_category" ||
                                                Request::route()->getName() == "app_add_room")
                                            active
                        @endif has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="fas fa-bed"></i>
                        <span>{{ __('room.rooms') }}</span>
                    </a>
                    <ul class="submenu @if(Request::route()->getName() == "app_room_category" ||
                                            Request::route()->getName() == "app_rooms" ||
                                            Request::route()->getName() == "app_add_room_category" ||
                                            Request::route()->getName() == "app_add_room")
                                            active
                        @endif">
                        <li class="submenu-item @if(Request::route()->getName() == "app_rooms") active @endif">
                            <a href="{{ route('app_rooms') }}">
                                {{ __('room.room_list') }}
                            </a>
                        </li>
                        <li class="submenu-item @if(Request::route()->getName() == "app_room_category") active @endif">
                            <a href="{{ route('app_room_category') }}">
                                {{ __('article.article_category') }}
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item @if (Request::route()->getName() == "app_currency" ||
                                                Request::route()->getName() == "app_create_currency" ||
                                                Request::route()->getName() == "app_info_currency" ||
                                                Request::route()->getName() == "app_update_currency") active @endif">
                    <a href="{{ route('app_currency') }}" class='sidebar-link'>
                        <i class="fa-solid fa-money-bill-trend-up"></i>
                        <span>{{ __('dashboard.currencies') }}</span>
                    </a>
                </li>

                <li class="sidebar-item @if (Request::route()->getName() == "app_payment_methods" ||
                                                Request::route()->getName() == "app_add_new_payment_methods" ||
                                                Request::route()->getName() == "app_info_payment_methods" ||
                                                Request::route()->getName() == "app_update_payment_methods") active @endif">
                    <a href="{{ route('app_payment_methods') }}" class='sidebar-link'>
                        <i class="fa-solid fa-coins"></i>
                        <span>{{ __('dashboard.payment_methods') }}</span>
                    </a>
                </li>

                <li class="sidebar-item  @if(Request::route()->getName() == "app_booking" ||
                                                Request::route()->getName() == "app_add_booking")
                                                active
                                        @endif">
                    <a href="{{ route('app_booking') }}" class='sidebar-link'>
                        <i class="fas fa-calendar-check"></i>
                        <span>{{ __('reservation.reservations') }}</span>
                    </a>
                </li>

                <li class="sidebar-item  @if(Request::route()->getName() == "app_services" ||
                                                Request::route()->getName() == "app_add_services")
                                                active @endif">
                    <a href="{{ route('app_services') }}" class='sidebar-link'>
                        <i class="fas fa-concierge-bell"></i>
                        <span>{{ __('dashboard.services') }}</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-file-invoice-dollar"></i>
                        <span>{{ __('dashboard.invoices') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-clipboard-list"></i>
                        <span>{{ __('dashboard.report') }}</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
