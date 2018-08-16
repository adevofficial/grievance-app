@extends('layouts.dashboard') 
@section('content')

<h4 class="mt-4 mb-4">Complaints</h4>

<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Subject</th>
            <th scope="col">Category</th>
            <th scope="col">Created </th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allComplaints as $item)
        <tr>
            <th scope="row">{{$item['id']}}</th>
            <td>{{$item["subject"]}}</td>
            <td>{{$item["category"]}}</td>
            <td>{{$item["created_at"]}}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-success">Open</button>
                </div>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>
<div class="float-right">

    {{$allComplaints->links("vendor.pagination.bootstrap-4")}}
</div>
@endsection