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