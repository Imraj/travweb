@extends('temp')



@section('content')


<div class="row animate-in" data-anim-type="fade-in-up" style="margin-top:4em;">
    <div class="col col-xs-0 col-sm-0 col-md-3 col-lg-3"></div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    {{Form::open()}}

        <div class="form-group">
            {{Form::text("phoneNumber","",array("class"=>"form-control","required"=>true,"placeholder"=>"Enter Your Phone Number"))}}
        </div>
        <div class="form-group">
            {{Form::password("password",array("class"=>"form-control","required"=>true,"placeholder"=>"Enter Your Password"))}}
            <a href="{{ url('/retrieve/password') }}" id="forgotpwd" class="pull-right ">Forgot Password ? </a>
        </div><br/>
        <div class="form-group">
          {{Form::submit("Log In",array("class"=>"btn btn-success btn-md col-xs-12") )}}
        </div><br/><br/>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <a href="{{ url('/register')}}" id="forgotpwd" class="text-center col-md-12">New here? Create an account</a>
        </div>
    {{Form::close()}}
  </div>
</div>
@stop
