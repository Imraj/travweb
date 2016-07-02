@extends('master')



@section('content')

<style>
  #forgotpwd{
    color:white;
  }
</style>

<div class="row animate-in" data-anim-type="fade-in-up" style="margin-top:7em;">
    <div class="col col-xs-3"></div>
    <div class="col-xs-6">
    {{Form::open()}}

        <div class="form-group">
            {{Form::text("phoneNumber","",array("class"=>"form-control","required"=>true,"placeholder"=>"Enter Your Phone Number"))}}
        </div>
        <div class="form-group">
            {{Form::password("password",array("class"=>"form-control","required"=>true,"placeholder"=>"Enter Your Password"))}}
            <a href="{{ url('/retrieve/password') }}" id="forgotpwd" class="col-xs-4 pull-right">Forgot Password ? </a>
        </div><br/>
        <div class="form-group">
          {{Form::submit("Log In",array("class"=>"btn btn-success btn-md col-xs-12") )}}
        </div><br/><br/>
        <div class="col-xs-12">
            <a href="{{ url('/register')}}" id="forgotpwd" class="text-center col-xs-12">New here? Create an account</a>
        </div>
    {{Form::close()}}
  </div>
</div>
@stop
