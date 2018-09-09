@extends('layouts.dashboard') 
@section('content')
<div class="row h-100">

    <div class="col-8">
        <div class="d-flex mt-4 mb-4 justify-content-between">

            <h4 class="">Complaints</h4>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a class="btn btn-success" href="{{ action('ComplientController@index', ['form'=>'create']) }}">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    Create</a>
            </div>
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
                    <td style="width:10px;">
                        <div class="btn-group" role="group" aria-label="Basic example">



                            <div class="dropdown open">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId{{$item['id']}}" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId{{$item['id']}}">
                                    <a href="{{ action('ComplientController@index', ['form'=>'viewer','complaint_id'=>$item['id']]) }}" class="dropdown-item">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                Open</a>
                                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModal{{$item['id']}}" data-compliant-id="{{$item['id']}}">
                                <i class="fa fa-ban" aria-hidden="true"></i>
                                Delete</button>
                                </div>
                            </div>


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