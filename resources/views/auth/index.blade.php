
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
    <div class="card card-login mx-auto mt-5">
      <div class="card-header"><i class="fa fa-sign-in"></i> Login</div>
      <div class="card-body">
        @include('messages.message')
        <form method="post" action="{{ route('postLogin') }}">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="email">Email address</label>
            <input class="form-control" id="email" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ Request::old('email') }}">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" id="password" name="password" type="password" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block" href="{{ route('login')}}">Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="{{ route('register')}}">Register an Account</a>
          <a class="d-block small" href="{{ route('forgotpassword')}}/?fg= <?php echo bcrypt('forgotpassword')?>">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="{{ ('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ ('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ ('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#email').on('keyup', function(){
        $('#logMsg').fadeOut();
      })
    });
  </script>
</body>

</html>

