<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}" role="button">SISTEMA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}"><span class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @auth
                <ul class="navbar-nav me-auto">
                    @can('can_employee_view')
                    <li class="nav-item"><a class="nav-lin nav_cust {{Route::is('employee.*') ? 'active_title' : ''}}" href="{{route('employee.view')}}">EMPLEADOS</a></li>
                    @endcan
                    <li class="nav-item"><a class="nav-lin nav_cust {{Route::is('user.perfil.*') ? 'active_title' : ''}}" href="{{route('user.perfil.view')}}">PERFIL</a></li>
                    <li class="nav-item"><a class="nav-lin nav_cust {{Route::is('user.password.*') ? 'active_title' : ''}}" href="{{route('user.password.view')}}">CONFIGURACIÓN</a></li>
                </ul>
            @endauth
            <ul class="navbar-nav ms-auto">
                @guest
                    @if (Route::has('login')) <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li> @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->username }}</a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
