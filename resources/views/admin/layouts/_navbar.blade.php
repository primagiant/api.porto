<div class="header">

    <div class="header-left">
        <a href="{{ route('dashboard') }}" class="logo">
            <img src="{{ asset('') }}assets/img/Logo-dark.svg" alt="Logo">
        </a>
        <a href="{{ route('dashboard') }}" class="logo logo-small">
            <img src="{{ asset('') }}assets/img/Logo-dark-small.svg" alt="Logo" width="30" height="30">
        </a>
    </div>

    <a href="javascript:void(0);" id="toggle_btn">
        <i class="fas fa-bars"></i>
    </a>


    <a class="mobile_btn" id="mobile_btn">
        <i class="fas fa-bars"></i>
    </a>


    <ul class="nav user-menu">
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img">
                    <img src="{{ asset('') }}assets/img/profiles/avatar-02.jpg" alt="">
                    <span class="status online"></span>
                </span>
                <span>{{ Auth::user()->name }}</span>
            </a>
            <form action="{{ route('logout') }}" method="POST" class="dropdown-menu">
                @csrf
                <a class="dropdown-item" href=""><i data-feather="user" class="mr-1"></i>
                    Profile</a>
                <a class="dropdown-item" href=""><i data-feather="settings" class="mr-1"></i>
                    Settings</a>
                <button class="dropdown-item" type="submit"><i data-feather="log-out" class="mr-1"></i>
                    Logout</button>
            </form>
        </li>

    </ul>

</div>
