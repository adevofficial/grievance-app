<h4 class="">File a complient</h4>
<hr>
<form action="{{ action('ComplientController@store') }}" method="post">
    {{ csrf_field() }}
    <div class="row">

        <div class="form-group col">
            <label for="subject">
      <i class="fa fa-address-book-o" aria-hidden="true"></i>
      Subject</label>
            <input type="text" name="subject" id="subject" class="form-control" placeholder="Complaint is about ..." aria-describedby="helpId">
        </div>

        <div class="form-group col">
            <label for="subject">
      <i class="fa fa-bookmark" aria-hidden="true"></i>
      Catogery</label>
            <select class="form-control" placeholder="Complaint catogery" name="category" id="">
          <option>General</option>
          <option>Hospitality</option>
          <option>Faculty</option>
        </select>
        </div>

    </div>
    <div class="form-group">
        <label for="message">
      <i class="fa fa-comment" aria-hidden="true"></i>
      Message</label>
        <textarea name="message" id="" cols="30" rows="10" placeholder="Complaint letter to respected ..." class="form-control"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn float-right btn-primary">
      <i class="fa fa-file" aria-hidden="true"></i>
      File Complient</button>
    </div>

</form>