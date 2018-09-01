<h4>
    Complaint Details
</h4>
<div class="border p-2 px-3 mt-2 bg-light rounded">

    <div class="d-flex w-100 justify-content-between mb-2">

        <div>
            <div class="font-weight-bold">
                Subject
            </div>
            <div>
                {{$formSideData['ViewComplient']['subject']}}
            </div>
        </div>

        <div>
            <div class="font-weight-bold">Category</div>
            <div>
                {{$formSideData['ViewComplient']['category']}}
            </div>
        </div>
    </div>

    <div>
        <div class="font-weight-bold">Message</div>
        <div>
            {{$formSideData['ViewComplient']['message']}}
        </div>
    </div>
</div>


<div class="border p-2 px-3 mt-2 bg-light rounded">

    <form action="{{ action('ComplientController@status_create') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="complient_id" value="{{$formSideData['ViewComplient']['id']}}">
        <div class="form-group">
            <label for="">Status</label>
            <select name="status" id="" class="form-control">

            <option>Selected for Processing</option>
            <option>Under Processing</option>
            <option>Solution Defined</option>
            <option>Solved</option>
        </select>
        </div>
        <div class="form-group">
            <label for="">Status Update</label>
            <textarea name="status_body" id="" cols="20" rows="5" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-primary">Save</button>
        </div>

    </form>
</div>

<div class="border p-2 px-3 mt-2 bg-light rounded">
    @foreach ( $formSideData['ViewComplient']['status'] as $item)

    <div class="border-bottom pb-2 mb-2">
        <div class="font-weight-light mb-2">
            Status:
            <span class="font-weight-bold pb-2"> {{$item['status']}}</span>
        </div>


        <div>{{$item['status_body']}}</div>
    </div>

    @endforeach

</div>