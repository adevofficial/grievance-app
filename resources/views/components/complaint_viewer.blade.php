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
                Subject text
            </div>
        </div>

        <div>
            <div class="font-weight-bold">Category</div>
            <div>Category text</div>
        </div>
    </div>

    <div>
        <div class="font-weight-bold">Message</div>
        <div>Message text</div>
    </div>
</div>


<div class="border p-2 px-3 mt-2 bg-light rounded">

    <form action="" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="complient_id">
        <div class="form-group">
            <label for="">Status</label>
            <select name="status" id="" class="form-control">

            <option>Seleced for Processing</option>
            <option>Under Processing</option>
            <option>Solution Defined</option>
            <option>Solved</option>
        </select>
        </div>
        <div class="form-group">
            <label for="">Status Update</label>
            <textarea name="status_text" id="" cols="20" rows="5" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-primary">Save</button>
        </div>

    </form>
</div>

<div class="border p-2 px-3 mt-2 bg-light rounded">
    <div class="">
        <div class="font-weight-bold border-bottom pb-2">Status</div>

        <div>text</div>
    </div>

</div>