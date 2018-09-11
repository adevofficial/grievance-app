@extends('layouts.basic') 
@section('content-body')
    @include('components.main-nav')

<div style="background:url('{{ asset('images/bg.jpg') }}'); background-size:cover;" class="container-fluid pb-2 hv-100">
    @yield("content")
</div>
    @include('components.main-footer')
@endsection