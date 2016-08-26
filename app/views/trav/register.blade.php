@extends('temp')



@section('content')

<div class="row animate-in" style="margin-top:4em;" data-anim-type="fade-in-up">
   <div class="col-md-3 col-lg-3 col-xs-0 col-sm-0"></div>
   <div class="col col-xs-12 col-sm-12 col-md-6 col-lg-6">
        @if ($errors->has())
        <div class="alert alert-warning">
            @foreach($errors->all() as $error )
                {{$error}}<br/>
            @endforeach
        </div>
        @endif
    {{Form::open()}}
        <div class="form-group">
            {{Form::text("fullName","",array("class"=>"form-control","required"=>true,"placeholder"=>"Enter Your Full Name"))}}
        </div>
        <div class="form-group">
            {{Form::text("emailAddress","",array("class"=>"form-control","required"=>true,"placeholder"=>"Enter Your Email Address"))}}
        </div>
        <div class="form-group">
            {{Form::text("phoneNumber","",array("class"=>"form-control","required"=>true,"placeholder"=>"Enter Your Phone Number"))}}
        </div>
        <div class="form-group">
            {{Form::password("password",array("class"=>"form-control","required"=>true,"placeholder"=>"Enter Your Password"))}}
        </div>
        <div class="form-group">
          {{Form::password("confirm_password",array("class"=>"form-control","required"=>true,"placeholder"=>"Enter Your Password Again"))}}
        </div>
        <div class="form-group">
             Clicking on the register button means you hereby agree to Trav's terms and conditions
        </div>
        <div class="form-group">
            {{Form::submit("Create My Account",array("class"=>"btn btn-success btn-md col-xs-12") )}}
        </div><br/><br/><br/>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <a href="{{ url('/login')}}" id="forgotpwd" class="text-center col-md-12">Existing user? Sign In</a>
        </div>

    {{Form::close()}}
  </div>
</div>
@stop
