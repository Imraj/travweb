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

<!--------------extends master----------------------------------------------------------------------->


<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
   <div class="services-wrapper">
      <h3>User Details</h3>
      <div class="container">
        <div class="row">
              <div class="col-xs-6">
                <h4>Full Name : <span id="ss-dd-fullname">{{ $user->fullName }}<span></h4>
              </div>
          </div>
          <div class="row">
              <div class="col-xs-6">
                <h4>Email Address : <span id="ss-dd-emailAddress">{{ $user->emailAddress }}</span></h4>
              </div>
          </div>
          <div class="row">
              <div class="col-xs-6">
                <h4>Phone Number : <span id="ss-dd-phoneNumber">{{ $user->phoneNumber }}</span></h4>
              </div>
          </div>

    </div>
  </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
     <div class="services-wrapper">
        <div class="container">
          <h3>Select A Payment Mode</h3>

          <div class="row">
              <!--form id="checkout_form" method="post" action="verify.php">
                <div class="form-group">
                  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                     <div class="">-->
                          <div class="col-xs-12">
                            <!--<a id="fmp-button" href="#" rel="YOUR SERVICE ID HERE/userId123">
                                  <img src="{{asset('assets/img/pay_mobile.png')}}" width="96" height="47" alt="Mobile Payments by Fortumo" border="0" />
                            </a>-->

                            <form method='POST' action='https://voguepay.com/pay/'>

<input type='hidden' name='v_merchant_id' value='demo' />
<input type='hidden' name='merchant_ref' value='234-567-890' />
<input type='hidden' name='memo' value='{{ $tplan["location"]}} to {{ $tplan["destination"]}} with {{ $tplan["agency_name"]}}' />

<input type='hidden' name='notify_url' value='http://mmc.orgfree.com/notification.php' />
<input type='hidden' name='success_url' value='http://mmc.orgfree.com/thank_you.html' />
<input type='hidden' name='fail_url' value='http://mmc.orgfree.com/failed.html' />

<input type='hidden' name='developer_code' value='pq7778ehh9YbZ' />
<input type='hidden' name='store_id' value='25' />

<input type='hidden' name='cur' value='NGN' />

<input type='hidden' name='total' value='{{ $tplan["price"] }}' />



</form>

<form id="checkout_form" action="/verify" method="post">

</form>
<button id="btn-checkout" class="btn btn-primary">Pay Now</button>
                            <!---Payment ends-->


                          <!--</div>

                    </div>

                  </div>
                </div>
              </form>-->
            </div>
          </div>
        </div>
    </div>
</div>


<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
   <div class="services-wrapper">
     <h3>Travel Details</h3>
        <div class="container">

              <div class="row">
                <div class="col-xs-6">
                  <h4><span id="ss-dd-agency">{{ $tplan['agency_name'] }}</span></h4>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-6">
                  <h4><b>From:</b><span id="ss-dd-location">{{ $tplan["location"]}}</span></h4>
                </div>
                <div class="col-xs-6">
                  <h4><b>To:</b><span id="ss-dd-destination">{{ $tplan["destination"]}}</span></h4>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-6">
                  <h4><b>PickUp:</b>{{ $tplan["pickup_name"]}},{{ $tplan["pickup_address"]}}</h4>
                </div>
                <div class="col-xs-6">
                  <h4><b>DropOff:</b>{{ $tplan["dropoff_name"]}},{{ $tplan["dropoff_address"] }}</h4>
                </div>

              </div>
              <div class="row">
                <div class="col-xs-6">
                  <h4><b>Take Off Time : {{$tplan["pickup_datetime"]}} </b></h4>
                </div>
                <div class="col-xs-6">
                  <h4>Price : N<span id="ss-dd-price">{{$tplan["price"]}}</span></h4>
                </div>
              </div>
            </div>

       </div>
    </div>

<!--------------------------------extend master ends------------------------------------------------------------------>
</div>
</div>
</div>
</div>
</div>
<!--HOME SECTION END-->


<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME -->
<!-- CORE JQUERY -->
<script src="https://checkout.simplepay.ng/simplepay.js"></script>
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

<script>
function processPayment (token)
{
// implement your code here - we call this after a token is generated
// example:
	var location=$("#ss-dd-location").html();
	var destination=$("#ss-dd-destination").html();
	var transaction_id = "1234TRID";
	var email_address = $("#ss-dd-emailAddress").html();
	var phone_number = $("#ss-dd-phoneNumber").html();
	var price =  $("#ss-dd-price").html();
	var agency = $("#ss-dd-agency").html();
	var fullname = $('#ss-dd-fullname').html();

  var form = $('#checkout_form');

  form.append(
     $('<input />', { name: 'token', type: 'hidden', value: token })
	);
	form.append(
		$('<input />',{name:'location',type:'hidden',value:location})
  );

	form.append(
		$('<input />',{name:'destination',type:'hidden',value:destination})
  );

	form.append(
	 $('<input />',{name:'transaction_id',type:'hidden',value:transaction_id})
  );

	form.append(
	 $('<input />',{name:'email_address',type:'hidden',value:email_address})
	);

	form.append(
		 $('<input />',{name:'phone_number',type:'hidden',value:phone_number})
	);
	form.append(
		 $('<input />',{name:'price',type:'hidden',value:price})
	);
	form.append(
		$('<input />',{name:'fullname',type:'hidden',value:fullname})
	);
	form.append(
		$('<input />',{name:'agency',type:'hidden',value:agency})
	);

  form.submit();
}

      // Configure SimplePay's Gateway
var handler = SimplePay.configure({
          token: processPayment, // callback function to be called after token is received
          key: 'test_pu_3f2972e363b4416992571728fc85c138',//'test_pu_demo', // place your api key. Demo: test_pu_*. Live: pu_*
          image: 'http://' // optional: an url to an image of your choice
});

$('#btn-checkout').on('click', function () { // add the event to your "pay" button
          //e.preventDefault();
          handler.open(SimplePay.CHECKOUT, // type of payment
          {
              email: $("#ss-dd-emailAddress").html(), // optional: user's email
              phone: $("#ss-dd-phoneNumber").html(), // optional: user's phone number
              description: $("#ss-dd-agency").html() + ' Ticket For ' + $("#ss-dd-location").html() + " To "+$("#ss-dd-destination").html(), // a description of your choosing
              country: 'NG', // user's country
              amount: $("#ss-dd-price").html() * 100, // value of the purchase, ₦ 1100
              currency: 'NGN' // currency of the transaction
          });
					console.log($("#ss-dd-emailAddress").html());
					console.log($("#ss-dd-phoneNumber").html());
					console.log($("#ss-dd-price").html());
});


</script>

</body>

</html>
