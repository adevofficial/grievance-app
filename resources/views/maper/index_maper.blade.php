@extends('layouts.dashboard') 
@section('content')

<div class="row h-100">

    <div class="col-8">

        <h4 class="mt-4 mb-4">Maper</h4>

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Created</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allMapers as $item)
                <tr>
                    <th scope="row">{{$item['id']}}</th>
                    <td>{{$item["user"]['name']}}</td>
                    <td>{{$item["type"]}}</td>
                    <td>{{$item["created_at"]}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{action('MaperController@create')}}" class="btn btn-success">Open</a>


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
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Maper</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
                                    </div>
                                    <div class="modal-body">
                                        Do you want to delete ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <form action="{{action('MaperController@destroy',['id'=>$item['id']])}}" method="post">
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

            {{$allMapers->links("vendor.pagination.bootstrap-4")}}
        </div>
    </div>
    <div class="col-4 border-left pt-2">
    @includeWhen($formSideBox=="create",'components.maper_form',["formSideData"=>$formSideData])
    </div>
</div>
@endsection