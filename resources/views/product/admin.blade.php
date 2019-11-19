<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Font Awesome JS -->
   <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
   <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <!-- Our Custom CSS -->
    <script type="text/javascript" src="{{ URL::asset('js/myjs.js') }}"></script>

    <link href="{{ asset('css/adminstyle.css') }}" rel="stylesheet">

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>


    <title></title>
  </head>
  <body>


    <div class="wrapper">

    <!-- Sidebar -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <a href="/product/admin" class="nav-link"><h3>Webshop CMS</h3></a>
      </div>

      <ul class="list-unstyled components">
          <p>Administrator</p>
          <li class="">
              <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Proizvodi</a>
              <ul class="collapse list-unstyled" id="homeSubmenu">
                  <li>
                      <a href="/product/create">Dodaj Proizvod</a>
                  </li>
                  <li>
                      <a href="/product/index">Pregled proizvoda</a>
                  </li>
              </ul>
          </li>
          <li>
              <a href="#">About</a>
          </li>
          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Korisnici</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                  <li>
                      <a href="/user/index">Lista korisnika</a>
                  </li>
                  <li>
                      <a href="#">Page 2</a>
                  </li>
                  <li>
                      <a href="#">Page 3</a>
                  </li>
              </ul>
          </li>
          <li>
              <a href="#">Portfolio</a>
          </li>
          <li>
              <a href="#">Contact</a>
          </li>
      </ul>
      <div class="text-center">
        <a href="/home" class="btn btn-light">Natrag u trgovinu</a>
      </div>
    </nav>


    <!-- Page Content -->
    <div id="content" class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Toggle Sidebar</span>
            </button>

        </div>
    </nav>

    <div class="row">
      <div class="col-md-4">
        <div class="card-body text-center">
          <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Ukupno proizvoda
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{$count}}</div>
              </div>
              <div class="col-auto">
                  <i class="fas fa-comments fa-2x text-gray-300"></i>
              </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-body text-center">
          <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Ukupno Korisnika
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{$count_user}}</div>
              </div>
              <div class="col-auto">
                  <i class="fas fa-user fa-2x text-gray-300"></i>
              </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-body text-center">
          <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ukupno prometa
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
              </div>
              <div class="col-auto">
                  <i class="fas fa-money fa-2x text-gray-300"></i>
              </div>
          </div>
        </div>
      </div>
    </div>
    <hr class="my-4">



    @yield('content')
    </div>


</div>
  </body>
</html>
