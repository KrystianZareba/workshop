<nav class="navbar navbar-expand-lg navbar-light amber lighten-3">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
            aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item @if(Request::segment(1) === null) active @endif">
                <a class="nav-link" href="{{ route('home') }}">Główna</a>
            </li>
            <li class="nav-item @if(Request::segment(1) === 'contractors') active @endif">
                <a href="{{ route('contractors.index') }}" class="nav-link">
                    Kontrahenci
                </a>
            </li>
            @if(Auth::user()->admin)
                <li class="nav-item @if(Request::segment(1) === 'users') active @endif">
                    <a class="nav-link" href="{{ route('users.index') }}">Użytkownicy</a>
                </li>
            @endif
        </ul>
        <ul class="navbar-nav ml-auto nav-flex-icons">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                    {{ Auth::user()->name }}
                    <i class="fas fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-default p-0">
                    <a href="{{ route('changePassword') }}" class="dropdown-item">Zmień hasło</a>
                    <a class="dropdown-item" href="{{ route('logout') }}">Wyloguj się</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
