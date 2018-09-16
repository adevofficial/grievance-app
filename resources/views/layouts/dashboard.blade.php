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
                        <a class="nav-link active" href="{{ action('DashboardController@index') }}">
<i class="fa fa-tachometer" aria-hidden="true"></i>

              Dashboard 
            </a>
                    </li>

                    @role('admin')

                    <li class="nav-item">
                        <a class="nav-link" href="{{ action('MaperController@index',['id'=>'1']) }}">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
              Mail Maper
            </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
              Schedule Manage
            </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ action('UserController@index') }}">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
              Users Manage
            </a>
                    </li>


                    @endrole
                    <li class="nav-item">
                        <a class="nav-link" href="{{ action('ComplientController@index') }}">
                            <i class="fa fa-file-text" aria-hidden="true"></i>

              Complaints
            </a>
                    </li>

                    @role('admin')

                    <li class="nav-item">
                        <a class="nav-link" href="{{ action('ReportsController@index') }}">
                            <i class="fa fa-files-o" aria-hidden="true"></i>
              Reports
            </a>
                    </li>
                    @endrole

                </ul>

            </div>
        </nav>
        <main class="col-10">
            <div class="hv-100">

                @yield('content')
            </div>
        </main>
    </div>
</div>
    @include('components.main-footer')
@endsection