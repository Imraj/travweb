<!DOCTYPE html>
<html lang="en" class="no-js" >
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="description" content="" />
<meta name="author" content="" />
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<title>Trav</title>
<!-- BOOTSTRAP CORE CSS -->

<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" />
<!-- ION ICONS STYLES -->
<link href="{{ asset('assets/css/ionicons.css') }}" rel="stylesheet" />
<!-- FONT AWESOME ICONS STYLES -->
<link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet" />
<!-- FANCYBOX POPUP STYLES -->
<link href="{{ asset('assets/js/source/jquery.fancybox.css') }}" rel="stylesheet" />

<!-- CUSTOM CSS -->
<link href="{{ asset('assets/css/style-green.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/fuelux.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/jquery-ui.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/index-view.css') }}" rel="stylesheet" />
<!--<link href="//www.fuelcdn.com/fuelux/3.4.0/css/fuelux.min.css" rel="stylesheet">-->
<!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

    <!--<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
</head>
<body data-spy="scroll" data-target="#menu-section">
<!--MENU SECTION START-->
<div class="navbar navbar-inverse navbar-fixed-top scroll-me" id="menu-section" >
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ url("/") }}">Trav</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">

				<li><a href="{{ url('/') }}">Home</a></li>


        @if(Auth::check())
        <!-- <li><a href="#">Logged In as {{ Auth::user()->fullName }}</a></li>-->
				<!--<li><a href="{{ url('/transactions') }}">Transactions</a></li>
				  History/Ticket/Bookings-->
				<li><a href="{{ url('/profile')}}">My Profile</a></li>
				<li><a href="{{ url('/tickets') }}">Tickets</a></li>
				<li>{{ link_to("logout","Log Out") }}</li>
        @else
				<li><a href="{{ url('/register') }}">Register</a></li>
				<li><a href="{{ url('/login') }}">Sign In</a></li>
        @endif
				<li><a href="{{ url('/contact') }}">Contact</a></li>
				<div></div>
				<li>
          <a href="#">
            <strong><i class="glyphicon glyphicon-phone"></i></strong> : 0903 344 9024</a>
        </li>

			</ul>

		</div>
	</div>
</div>
<!--MENU SECTION END-->

<!--HOME SECTION START-->
<div id="home" >
   <div id="services" >
      <div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-12">
        @if(Session::has("error"))
          <div class="alert alert-warning">
            {{Session::get("error")}}
          </div>
        @endif

				@if(Session::has("success"))
					<div class="alert alert-success">
							{{Session::get("success")}}
					</div>
				@endif

	       @yield('content')


			 	</div>
			 </div>
      </div>
   </div>
</div>
<!--HOME SECTION END-->


<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME -->
<!-- CORE JQUERY -->

<script src="{{ asset('assets/js/jquery-1.11.1.js') }}"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<!-- EASING SCROLL SCRIPTS PLUGIN -->
<script src="{{ asset('assets/js/vegas/jquery.vegas.min.js') }}"></script>
<!-- VEGAS SLIDESHOW SCRIPTS -->
<!--<script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>-->
<!-- FANCYBOX PLUGIN -->
<script src="{{ asset('assets/js/source/jquery.fancybox.js')}}"></script>
<!-- ISOTOPE SCRIPTS -->
<script src="{{ asset('assets/js/jquery.isotope.js') }}"></script>
<!-- VIEWPORT ANIMATION SCRIPTS   -->
<!--<script src="{{ asset('assets/js/appear.min.js') }}"></script>
<script src="{{ asset('assets/js/animations.min.js') }}"></script>-->
<!-- CUSTOM SCRIPTS -->
<script src="{{ asset('assets/js/custom.js') }}"></script>


<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<!--<script src="//www.fuelcdn.com/fuelux/3.4.0/js/fuelux.min.js"></script>-->
<script src="{{ asset('assets/js/fuelux.min.js') }}"></script>


<script>
	$(document).ready(function(){
		$('#myDatepicker').datepicker({
				allowPastDates: false
		});
	})

</script>
<script>
	$(function(){
		$("#geocomplete1").autocomplete({
			source:"/search/autocomplete",
			minLength:1,
			select:function(event,ui){
				$("#geocomplete1").val(ui.item.value);
			}
		});
	});
</script>
<script>
	$(function(){
		$("#geocomplete2").autocomplete({
			source:"/search/autocomplete",
			minLength:1,
			select:function(event,ui){
				$("#geocomplete2").val(ui.item.value);
			}
		});
	});
</script>

</body>

</html>
