<form class="mt-2" action="{{ action('MaperController@store') }}" method="post">
    <h4>Create Maper</h4>
    <hr> {{ csrf_field() }}
    <div>
        Name
        <div class="font-weight-bold">
            {{ $formSideData['userData']['name'] }}
        </div>
        <input type="hidden" name="user_id" value="{{ $formSideData['userData']['id'] }}">
    </div>
    <div class="form-group">
        <label for="type">Type</label>
        <select class="form-control" name="type" id="type">
    <option>All</option>
  </select>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>