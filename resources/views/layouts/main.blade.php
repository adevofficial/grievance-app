@extends('layouts.basic') 
@section('content-body')
    @include('components.main-nav')

<div class="container pb-2">
    @yield("content")
</div>
@endsection