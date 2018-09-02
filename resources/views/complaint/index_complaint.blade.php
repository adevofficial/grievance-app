@extends('layouts.dashboard') 
@section('content')

<div class="row h-100">

    <div class="col-8">
        <h4 class="mt-4 mb-4">Complaints</h4>
        <div class="btn-group mb-2 float-right" role="group" aria-label="Basic example">
            <a class="btn btn-success" href="{{ action('ComplientController@index', ['form'=>'create']) }}">Create</a>
        </div>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Category</th>
                    <th scope="col">Status</th>
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
                    <td>
                        @if (isset($item["status"][0])) {{$item["status"][0]['status']}} @else Pending @endif


                    </td>
                    <td>{{$item["created_at"]}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ action('ComplientController@index', ['form'=>'viewer','complaint_id'=>$item['id']]) }}" class="btn btn-success">Open</a>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </div>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
        <div class="float-right">
            {{$allComplaints->links("vendor.pagination.bootstrap-4")}}
        </div>
    </div>
    <div class="col-4 border-left pt-2">
    @includeWhen($formSideBox=="create",'components.complaint_form_sub',["formSideData"=>$formSideData])
    @includeWhen($formSideBox=="viewer",'components.complaint_viewer',["formSideData"=>$formSideData])
    </div>
</div>
@endsection