<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Trav Administrator | </title>

  <!-- Bootstrap core CSS -->

  <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet">

  <link href="{{ asset('assets/admin/fonts/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/admin/css/animate.min.css') }}" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="{{ asset('assets/admin/css/custom.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/maps/jquery-jvectormap-2.0.3.css') }}" />
  <link href="{{ asset('assets/admin/css/icheck/flat/green.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/admin/css/floatexamples.css') }}" rel="stylesheet" type="text/css" />

  <link href="{{ asset('assets/css/fuelux.min.css') }}" rel="stylesheet">


</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="{{ url('/admin') }}" class="site_title"><i class="fa fa-paw"></i> <span>Trav</span></a>
          </div>
          <div class="clearfix"></div>

          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="{{ asset('assets/admin/images/img.jpg') }} " alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>{{ Auth::user()->fullName }}</h2>
            </div>
          </div>
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a href="{{ url('/admin') }}"> Home </a>

                </li>

                <li><a> Agencies <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                      <li><a href="{{ url('/admin/agency') }}">View All</a></li>
                      <li><a href="{{ url('/admin/agency/create') }}">Add New</a></li>
                  </ul>
                </li>
                <li><a>Cars <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu" style="display: none">
                          <li><a href="{{ url('/admin/car') }}">View All</a></li>
                          <li><a href="{{ url('admin/car/create') }}">Add New</a></li>
                      </ul>
                </li>
                <li><a> Places <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu" style="display: none">
                          <li><a href="{{ url('/admin/place') }}">View All</a></li>
                          <li><a href="{{ url('/admin/place/create') }}">Add New</a></li>
                      </ul>
                </li>
                <li><a> PickUp Locations <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu" style="display: none">
                          <li><a href="{{ url('/admin/pklocation') }}">View All</a></li>
                          <li><a href="{{ url('/admin/pklocation/create') }}">Add New</a></li>
                      </ul>
                </li>
                <li><a> Travel Plans <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu" style="display: none">
                          <li><a href="{{ url('/admin/travelplan') }}">View All</a></li>
                          <li><a href="{{ url('/admin/travelplan/create') }}">Add New</a></li>
                      </ul>
                </li>
                <li><a> ToDo List<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu" style="display: none">
                          <li><a href="{{ url('/admin/todo') }}">View All</a></li>
                          <li><a href="{{ url('/admin/todo/create') }}">Add New</a></li>
                      </ul>
                </li>
                <li><a> Transactions<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu" style="display: none">
                          <li><a href="{{ url('/admin/transaction') }}">View All</a></li>
                      </ul>
                </li>
                <li><a> Users <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu" style="display: none">
                          <li><a href="/admin/users">View All</a></li>

                      </ul>
                </li>
                <li><a> Tickets <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu" style="display: none">
                          <li><a href="">View All</a></li>

                      </ul>
                </li>
                <li><a> Payments <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu" style="display: none">
                          <li><a href="">View All</a></li>

                      </ul>
                </li>
                <li><a href="{{ url('/') }}"> Go to site </a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src=" {{ asset('assets/admin/images/img.jpg') }}" alt="">{{ Auth::user()->fullName}}
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <li><a href="javascript:;">  Profile</a>
                  </li>

                  <li><a href="{{url('logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>

              <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <span class="badge bg-green">6</span>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                  <li>
                    <a>
                      <span class="image">
                                        <img src="{{ asset('assets/admin/images/img.jpg') }}" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                    </a>
                  </li>

                  <li>
                    <div class="text-center">
                      <a href="inbox.html">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>

            </ul>
          </nav>
        </div>

      </div>
      <!-- /top navigation -->
          @if(Session::has("message"))
            {{ Session::get("message") }}
          @endif
        <!-- page content -->
          @yield('content')
        <!-- page content -->

      </div>
      <!-- /page content -->

    </div>

  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>

  <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/admin/js/nprogress.js') }}"></script>

  <script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/fuelux.min.js') }}"></script>
  <script src="{{ asset('assets/admin/js/custom.js') }}"></script>
  <script>
      $(document).ready(function(){
        $('#myDatepicker').datepicker({
            allowPastDates: false
        });
      })
  </script>
  <!-- /datepicker -->
  <!-- /footer content -->
</body>

</html>
