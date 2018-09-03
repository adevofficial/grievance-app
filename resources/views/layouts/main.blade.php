@extends('layouts.basic') 
@section('content-body')
    @include('components.main-nav')

<div class="container pb-2 hv-100">
    @yield("content")
</div>
    @include('components.main-footer')
@endsection