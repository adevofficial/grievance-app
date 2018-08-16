@extends('layouts.basic') 
@section('content-body')
    @include('components.main-nav')

<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

<div class="container-fluid">
    <div class="row" style="min-height:100vh">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
<i class="fa fa-tachometer" aria-hidden="true"></i>

              Dashboard 
            </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-file" aria-hidden="true"></i>
              Complient Managers
            </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
              Schedule Manage
            </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
              Users Manage
            </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-file-text" aria-hidden="true"></i>

              Complients
            </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-files-o" aria-hidden="true"></i>
              Reports
            </a>
                    </li>

                </ul>

            </div>
        </nav>
        <main class="col-10">

            @yield('content')

        </main>
    </div>
</div>
@endsection