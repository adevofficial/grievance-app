@if ($formSideBox=="create")
<h4>Add User</h4>
@elseif($formSideBox=="viewer")
<h4>User Details</h4>
@elseif($formSideBox=="edit")
<h4>Edit User</h4>
@endif @foreach ($errors->all() as $item) {{$item}} @endforeach
<hr> @if ($formSideBox=="create")
<form action="{{ action('UserController@store') }}" method="post">

    @elseif($formSideBox=="viewer")
    <form method="post">

        @elseif($formSideBox=="edit")
        <form action="{{ action('UserController@update', ['id'=>$formSideData['id']]) }}" method="post">

            @endif {{ csrf_field() }}
            <div class="form-group">
                <label for="">Name</label>
                <input name="name" type="text" placeholder="How others identify you ..." value="{{$formSideData['name']}}" class="form-control"></div>
            <div class="form-group">
                <label for="">Email</label>
                <input name="email" type="text" placeholder="Your @ address ..." value="{{$formSideData['email']}}" class="form-control"></div>
            @if ($formSideBox!="viewer")

            <div class="form-group">
                <label for="">Password</label>
                <input name="password" type="password" placeholder="Key to open account ..." class="form-control">
                <small id="emailHelpId" class="form-text text-muted">Setting new value will reset password <br> Keep filed empty for not reseting</small>
            </div>
            @endif

            <div class="d-flex justify-content-between">
                @if ($formSideBox=="create")
                <div class="form-group"><input type="submit" value="Save" class="btn btn-success "></div>
                <div class="form-group"><input type="submit" value="Save & Mail" class="btn btn-primary"></div>
                @elseif($formSideBox=="edit")
                <div class="form-group"><input type="submit" value="Save" class="btn btn-success "></div>

                @endif
            </div>
        </form>