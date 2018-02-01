
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Laravel Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="{{ ('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{ ('assets/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="{{ ('assets/css/sb-admin.css') }}" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <!-- error message -->
       @if ($errors->any())
                    <div style="color:red;">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                     @if(\Session::has('success'))
                        <div class="alert alert-success" alert-dismissible fade show" role="alert">
                            <strong><i class="fa fa-check-circle"></i> {{\Session::get('success')}}, Click here to<a href="{{ route('login')}}"> login </a></strong>
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
        <form method="post" action="{{ route('postRegister') }}">
          {{ csrf_field() }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="firstname">First name</label>
                <input class="form-control" id="firstname" name="firstname" type="text" aria-describedby="nameHelp" placeholder="Enter first name" value="{{ Request::old('firstname')}}">
              </div>
              <div class="col-md-6">
                <label for="lastname">Last name</label>
                <input class="form-control" id="lastname" name="lastname" type="text" aria-describedby="nameHelp" placeholder="Enter last name" value="{{ Request::old('lastname')}}">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input class="form-control" id="email" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ Request::old('email')}}">
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
          <button type="submit" class="btn btn-primary btn-block" href="#">Register</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="{{ route('login')}}">Login Page</a>
          <a class="d-block small" href="{{ route('forgotpassword') }}">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="{{ ('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ ('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ ('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
</body>

</html>
