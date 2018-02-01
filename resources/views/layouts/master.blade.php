
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Dashboard</title>
  <!-- Bootstrap core CSS-->
  <link href="{{ ('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  
  <!-- Custom fonts for this template-->
  <link href="{{ ('assets/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="{{ ('assets/css/sb-admin.css') }}" rel="stylesheet">
      <!-- Bootstrap core JavaScript-->
    <script src="{{ ('assets/vendor/jquery/jquery.min.js') }}"></script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
 @include('includes.header')
  <div class="content-wrapper">
    <div class="container-fluid">
      @include('Dashboard.user.myAccount')
      <!--content -->
      @yield('content')
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    
   @include('includes.footer')
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    @include('includes.logout_modal')

    <script src="{{ ('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ ('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ ('assets/js/sb-admin.min.js') }}"></script>
    <script>
      $(document).ready(function(){
        $('#createNew').click(function(){
          event.preventDefault();
          $('#logMsg').fadeOut('slow');
        })
        
      });
    </script>
  </div>
</body>

</html>
