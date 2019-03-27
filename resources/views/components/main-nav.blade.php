<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="{{ asset('images/icon.png') }}" alt="Grievance" width="30px"> 
        <div class="ml-2">

            {{ config('app.name', 'Basic') }}
        </div>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('index') }}">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    Home</a>
            </li>

            @if (Auth::guest()) {{--
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li> --}} {{--
            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li> --}} @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                                {{ Auth::user()->name }}
                        </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a href="{{route('dashboard')}}" class="dropdown-item">Dashboard</a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          
                 Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                </div>
            </li>
            @endif
        </ul>
    </div>
</nav>