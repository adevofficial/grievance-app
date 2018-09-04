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
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$item['id']}}" data-compliant-id="{{$item['id']}}">Delete</button>





                        </div>
                        <div class="modal fade" id="exampleModal{{$item['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Compliant</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
                                    </div>
                                    <div class="modal-body">
                                        Do you want to delete ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                        <form action="{{action('ComplientController@destroy',['id'=>$item['id']])}}" method="post">

                                            {{method_field("DELETE")}} {{ csrf_field() }}
                                            <button type="submit" class="btn btn-primary">Yes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
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