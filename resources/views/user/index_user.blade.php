@extends('layouts.dashboard') 
@section('content')

<h4 class="mt-4 mb-4">Users</h4>

<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Created </th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allUsers as $item)
        <tr>
            <th scope="row">{{$item['id']}}</th>
            <td>{{$item["name"]}}</td>
            <td>{{$item["email"]}}</td>
            <td>{{$item["created_at"]}}</td>
            <td style="width:100px">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-success">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        View</button>
                    <button type="button" class="btn btn-secondary">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
Edit
                    </button>
                    <button type="button" class="btn btn-danger">
                        
                        <i class="fa fa-ban" aria-hidden="true"></i>
                        Delete
                    </button>
                </div>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>
<div class="float-right">

    {{$allUsers->links("vendor.pagination.bootstrap-4")}}
</div>
@endsection