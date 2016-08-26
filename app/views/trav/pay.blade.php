<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>Trav</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">    
    <link rel="shortcut icon" href="favicon.ico">  
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> 
    <!-- Global CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <!-- Plugins CSS -->    
    <link rel="stylesheet" href="{{ asset('assets/plugins/font-awesome/css/font-awesome.css') }}">
  
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
     <link href="{{ asset('assets/css/jquery-ui.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/fuelux.min.css') }}" rel="stylesheet"/>
   
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head> 

<body data-spy="scroll">
    
    <!-- ******HEADER****** --> 
    <header id="header" class="header">  
        <div class="container">            
            <h1 class="logo pull-left">
                <a class="scrollto" href="#promo">
                    <span class="logo-title">Trav</span>
                </a>
            </h1><!--//logo-->              
            <nav id="main-nav" class="main-nav navbar-right" role="navigation">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button><!--//nav-toggle-->
                </div><!--//navbar-header-->            
                <div class="navbar-collapse collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                      <li class="nav-item"><a href="{{ url('/') }}">Home</a></li>
                        @if(Auth::check())
                            <li class="nav-item"><a href="{{ url('/profile')}}">My Profile</a></li>
                            <li class="nav-item"><a href="{{ url('/tickets') }}">Tickets</a></li>
                            <li class="nav-item">{{ link_to("logout","Log Out") }}</li>
                        @else
                            <li class="nav-item"><a href="{{ url('/register') }}">Register</a></li>
                            <li class="nav-item"><a href="{{ url('/login') }}">Sign In</a></li>
                        @endif
                        <li class="nav-item"><a href="{{ url('/contact') }}">Contact</a></li>
                    </ul><!--//nav-->
                </div><!--//navabr-collapse-->
            </nav><!--//main-nav-->
        </div>
    </header><!--//header-->

<!--HOME SECTION START-->
 <section id="about" class="about section">
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




<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
   <div  style="color:black;">
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
              
                          <div class="col-xs-12">


<form id="checkout_form" action="/verify" method="post">

</form>
<button id="btn-checkout" class="btn btn-primary">Pay Now</button>
                          
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
                  <span id="ss-dd-traveplan_id" class="text-hide">{{ $tplan['travelplan_id'] }}</span>
                  <h4><span id="ss-dd-agency">{{ $tplan['agency_name'] }}</span></h4>
                </div>
                 <div class="col-xs-4">
                  <h4>Price : N<span id="ss-dd-price">{{$tplan["price"]}}</span></h4>
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
                <div class="col-xs-12">
                  <h4><b>PickUp:</b><span id="ss-dd-pickup">{{ $tplan["pickup_name"]}},{{ $tplan["pickup_address"]}}</span></h4>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <h4><b>DropOff:</b>{{ $tplan["dropoff_name"]}},{{ $tplan["dropoff_address"] }}</h4>
                </div>

              </div>
              <div class="row">
                <div class="col-xs-4">
                  <h4><b>Take Off Date : {{$tplan["pickup_date"]}} </b></h4>
                </div>
                <div class="col-xs-4">
                  <h4><b>Take Off Time : {{$tplan["pickup_time"]}} </b></h4>
                </div>
               
              </div>
            </div>

       </div>
    </div>

<!--------------------------------extend master ends------------------------------------------------------------------>
      </div>
    </div>
  </div>
</section>

<!--HOME SECTION END-->


<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME -->
<!-- CORE JQUERY -->

<section id="contact" class="" style="margin:1em;padding:1em;list-style-type:none">
        <div class="container">
            <div class="contact-inner">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <ul class="meta">
                        <li><a href="">Book a ticket</a></li>
                        <li> <a hef="">Register</a></li>
                         <li><a href="">Login</a></li>
                        <li> <a hef="">Download </a></li>
                         <li><a href="">Contact us</a></li>
                        <li> <a hef="">About us</a></li>
                        
                    </ul>
                  
                   
                </div>

                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                     <ul>
                         <li><a href="">FAQs</a></li>
                       
                    </ul>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                     <ul>
                        <li><a href="">Book a ticket</a></li>
                        <li> <a hef="">Contact us</a></li>
                        <li><a href="">Book a ticket</a></li>
                        <li> <a hef="">Contact us</a></li>
                        <li><a href="">Book a ticket</a></li>
                        <li> <a hef="">Contact us</a></li>
                         <li><a href="">Book a ticket</a></li>
                        <li> <a hef="">Contact us</a></li>
                    </ul>
                </div>


                <div class="clearfix"></div>
                
            </div><!--//contact-inner-->
        </div><!--//container-->
    </section><!--//contact-->  
      
    <!-- ******FOOTER****** --> 
    <footer class="footer">
         <img src="{{ asset('assets/img/powered_horizontal_dark.png') }}" />
    </footer><!--//footer-->
     
    <!-- Javascript -->          
    <script src="https://checkout.simplepay.ng/simplepay.js"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/jquery-1.11.3.min.js') }}"></script>   
    <script type="text/javascript" src="{{ asset('assets/plugins/jquery.easing.1.3.js') }}"></script>   
    <script type="text/javascript" src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>     
    <script type="text/javascript" src="{{ asset('assets/plugins/jquery-scrollTo/jquery.scrollTo.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>    
    <script type="text/javascript" src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>      
    <script type="text/javascript" src="{{ asset('assets/js/fuelux.min.js') }}"></script> 
    
     <script>
        $(document).ready(function(){
            $('#myDatepicker').datepicker({
                    allowPastDates: false
            });
        })
   </script>  
    <script>
    function processPayment (token)
    {
    // implement your code here - we call this after a token is generated
    // example:
    	var location=$("#ss-dd-location").html();
    	var destination=$("#ss-dd-destination").html();
      var travelplan_id = $("#ss-dd-traveplan_id").html();
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
      form.append(
        $('<input />',{name:'travelplan_id',type:'hidden',value:travelplan_id})
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
              e.preventDefault();
              handler.open(SimplePay.CHECKOUT, // type of payment
              {
                  email: $("#ss-dd-emailAddress").html(), // optional: user's email
                  phone: $("#ss-dd-phoneNumber").html(), // optional: user's phone number
                  description: $("#ss-dd-agency").html() + ' Ticket For ' + $("#ss-dd-location").html() + " To "+$("#ss-dd-destination").html(), // a description of your choosing
                  country: 'NG', // user's country
                  amount: $("#ss-dd-price").html() * 100, // value of the purchase, ₦ 1100
                  currency: 'NGN', // currency of the transaction
                  city:$("#ss-dd-location").html(),
                  address:$('#ss-dd-pickup').html()
              });
    					console.log($("#ss-dd-emailAddress").html());
    					console.log($("#ss-dd-phoneNumber").html());
    					console.log($("#ss-dd-price").html());
              console.log($("#ss-dd-location").html());
              console.log($("#ss-dd-pickup").html());
    });


    </script>

</body>

</html>
