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
    <link href="{{ asset('assets/css/ionicons.css') }}" rel="stylesheet" />

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
    
    <!-- ******PROMO****** -->
   
    
    <!-- ******ABOUT****** --> 
    <section id="about" class="about section">
        <div class="container">
            <h2 class="title text-center"></h2>
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
              
        </div><!--//container-->
    </section><!--//about-->
    
   
    
    <!-- ******CONTACT****** --> 
<section id="contact" class="" style="margin:1em;padding:1em;">
        <div class="container">
            <div class="contact-inner">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" >
                    <ul class="meta" style="list-style:none">
                        <li><a href="">Book a ticket</a></li>
                        <li> <a hef="">Download </a></li>
                        <li> <a hef="">Feedback or Suggestion</a></li>
                        
                    </ul>
                  
                   
                </div>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                     <ul style="list-style:none">
                         <li><a href="">FAQs</a></li>
                         <li><a href="">Refund Policy</a></li>
                         <li><a href="">Terms and Condition</a></li>
                    </ul>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <ul class="meta" style="list-style:none">
                       <li><a href="">Contact us</a></li>
                        <li> <a hef="">About us</a></li>
                        
                    </ul>
                </div>

            </div><!--//contact-inner-->
        </div><!--//container-->
    </section><!--//contact-->  
      
    <!-- ******FOOTER****** --> 
    <footer class="footer">
        <img src="{{ asset('assets/img/powered_horizontal_dark.png') }}" class="col-xs-12 col-md-5" />
    </footer><!--//footer-->
     
    <!-- Javascript -->          
    <script type="text/javascript" src="{{asset('assets/plugins/jquery-1.11.3.min.js')}}"></script>   
    <script type="text/javascript" src="{{asset('assets/plugins/jquery.easing.1.3.js')}}"></script>   
    <script type="text/javascript" src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>     
    <script type="text/javascript" src="{{asset('assets/plugins/jquery-scrollTo/jquery.scrollTo.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>    
    <script type="text/javascript" src="{{asset('assets/js/jquery-ui.min.js')}}"></script>      
    <script type="text/javascript" src="{{asset('assets/js/fuelux.min.js')}}"></script> 
    <script>
    $(document).ready(function(){
        $('#myDatepicker').datepicker({
                allowPastDates: false
        });
    })

    </script>
   

</body>
</html> 

