@extends('layouts.dashboard') 
@section('content')
<div class="row">

    <div class="col">
        <div class="d-flex w-100 justify-content-between mt-4 mb-4">

            <h4 class="">Users</h4>

            <div>
                <a href="{{action('UserController@index',['form'=>'create'])}}" class="btn btn-success">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            Create</a>
            </div>
        </div>

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
                            <a class="btn btn-primary" href="{{ action('MaperController@index', ['user_id'=>$item['id'],'form'=>'create']) }}">Map</a>
                            <a href="{{action('UserController@index',['form'=>'viewer','user_id'=>$item['id']])}}" class="btn btn-success">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    View</a>
                            <a href="{{action('UserController@index',['form'=>'edit','user_id'=>$item['id']])}}" class="btn btn-secondary">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
            Edit
                                </a>


                            <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$item['id']}}">
                                    
                                    <i class="fa fa-ban" aria-hidden="true"></i>
                                    Delete
                                </button>
                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$item['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
                                    </div>
                                    <div class="modal-body">
                                        Do you want to delete ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <form action="{{action('UserController@destroy',['id'=>$item['id']])}}" method="post">
                                            {{ csrf_field() }} {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger">Delete</button>
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

            {{$allUsers->links("vendor.pagination.bootstrap-4")}}
        </div>

    </div>
    <div class="col-4 border-left bg-light pt-2">
        @if (!empty($formSideBox))
    @include( 'components.user_form', ['formSideData' => $formSideData,'formSideBox'=>$formSideBox])
        @endif
    </div>
</div>
@endsection