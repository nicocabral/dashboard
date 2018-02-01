<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user-circle-o"></i> My account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('accountUpdate', Crypt::encrypt(Auth::user()->id))}}" method="post">
      <div class="modal-body">
        {{ csrf_field() }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="firstname">First name</label>
                <input class="form-control" id="firstname" name="firstname" type="text" aria-describedby="nameHelp" placeholder="Enter first name" value="{{ Auth::user()->fname}}" required>
              </div>
              <div class="col-md-6">
                <label for="lastname">Last name</label>
                <input class="form-control" id="lastname" name="lastname" type="text" aria-describedby="nameHelp" placeholder="Enter last name" value="{{ Auth::user()->lname}}" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input class="form-control" id="email" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ Auth::user()->email}}" required>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="password">Password</label>
                <input class="form-control" id="password" name="password" type="password" placeholder="Password" value="{{ Request::old('password')}}">
              </div>
              <div class="col-md-6">
                <label for="confirm_password">Confirm password</label>
                <input class="form-control" id="confirm_password" name="confirm_password" type="password" placeholder="Confirm password" value="{{ Request::old('confirm_password')}}">
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