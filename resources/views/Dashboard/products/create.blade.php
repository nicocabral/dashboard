<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-cubes"></i> Create new product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('createProduct') }}" method="post">
      <div class="modal-body">
        {{ csrf_field() }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="firstname">Product name</label>
                <input class="form-control"  name="prodname" type="text" aria-describedby="nameHelp" placeholder="Enter Product name" value="{{ Request::old('prodname')}}" required>
               <span style="color:red;"> {{ $errors->first('prodname', ':message')}}</span>
              </div>
            </div>
            <div class="row" style="margin-top: 10px;">
              <div class="col-md-8">
                <label for="prodstat">Product Status</label>
                <select class="form-control" name="prodstat">
               
                  <option value="Available">Available</option>
                  <option value="Not-Available">Not-Available</option>
                </select>
                <span style="color:red;"> {{ $errors->first('prodstat', ' :message')}}</span>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="cursor:pointer;">Close</button>
        <button type="submit" class="btn btn-success" style="cursor:pointer;">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>