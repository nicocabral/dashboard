 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ route('index') }}"><i class="fa fa-fw fa-laptop"></i>Laravel Dashboard Template</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{ route('index') }}">
            <i class="fa fa-fw fa-desktop"></i>
            <span class="nav-link-text">Overview</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Products">
          <a class="nav-link" href="{{ route('products') }}">
            <i class="fa fa-fw fa-cubes"></i>
            <span class="nav-link-text">Products</span>
          </a>
        </li>
         <li class="nav-item" class="nav-item" data-toggle="tooltip" data-placement="right" title="Logout">
          <a class="nav-link" data-toggle="modal" data-target="#logoutModal">
            <i class="fa fa-fw fa-sign-out"></i><span class="nav-link-text">Logout</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
       <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-fw fa-user"></i> {{ Auth::user()->fname.' '. Auth::user()->lname }} </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#logoutModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>