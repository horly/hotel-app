<nav class="bg-primary d-flex align-items-center justify-content-between">
    <div>
        <div class="d-flex align-items-end ms-3" id="logo-nav-zone">
            <img class="rounded mx-auto d-block me-2" src="{{ asset('assets/img/logo/logo-white.png') }}" alt="" srcset="" height="70">
        </div>
    </div>

    <div class="d-flex align-items-center">
        <div class="dropdown-personal-menu me-2">
            <button class="dropbtn">
                <i class="fa-solid fa-language"></i> Lang
                @if (Config::get('app.locale') == 'en')
                    <i class="flag-icon flag-icon-gb rounded"></i>
                @else
                    <i class="flag-icon flag-icon-fr rounded"></i>
                @endif
                <i class="fa-solid fa-caret-down ms-2"></i>
            </button>
            <div class="dropdown-content" style="left:0;">
                <hr class="dropdown-divider">
                <a class="dropdown-item" href="{{ route('app_language', ['lang' => 'fr']) }}"><i class="flag-icon flag-icon-fr rounded"></i> Français</a>
                <hr class="dropdown-divider">
                <a class="dropdown-item" href="{{ route('app_language', ['lang' => 'en']) }}"><i class="flag-icon flag-icon-gb rounded"></i> English</a>
                <hr class="dropdown-divider">
            </div>
        </div>

        <div class="dropdown-personal-menu" style="float:right;">
            <button class="dropbtn user">
                <img src="{{ asset('assets/img/profile') }}/{{ Auth::user()->photo_profile_url }}.png" class="rounded-circle border me-2" alt="..." width="40">
                {{ Auth::user()->name }}
                <i class="fa-solid fa-caret-down ms-2"></i>
            </button>
            <div class="dropdown-content nav-login-dropdown">
                <hr class="dropdown-divider">
                <a class="dropdown-item" href="{{ route('app_dashboard') }}"><i class="fa-solid fa-house"></i> {{ __('main.home') }}</a>
                <hr class="dropdown-divider">
                <a class="dropdown-item" href="{{ route('app_profile') }}"><i class="fa-solid fa-user"></i> {{ __('main.profile') }}</a>
                <hr class="dropdown-divider">
                @if(Auth::user()->role->name == "admin")
                    <a class="dropdown-item" href="#"><i class="fa-solid fa-users"></i> {{ __('main.user_management') }}</a>
                @endif
                <hr class="dropdown-divider">
                <a class="dropdown-item" href="{{ route('app_login_history') }}"><i class="fa-solid fa-list"></i> {{ __('main.my_login_history') }}</a>
                <hr class="dropdown-divider">
                <a class="dropdown-item" href="{{ route('app_logout') }}"><i class="fa-solid fa-right-from-bracket"></i> {{ __('main.logout') }}</a>
            </div>
        </div>
    </div>
</nav>
