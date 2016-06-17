@extends('master')



@section('content')

<div class="row animate-in" data-anim-type="fade-in-up" style="margin-top:7em;">
    <div class="col col-xs-3"></div>
    <div class="col-xs-6">
    {{Form::open()}}

        <div class="form-group">
            {{Form::text("phoneNumber","",array("class"=>"form-control","required"=>true,"placeholder"=>"Enter Your Phone Number"))}}
        </div>
        <div class="form-group">
            {{Form::password("password",array("class"=>"form-control","required"=>true,"placeholder"=>"Enter Your Password"))}}
        </div>
        <div class="form-group">
            {{Form::submit("Log In",array("class"=>"btn btn-success btn-md col-xs-12") )}}
        </div><br/><br/><br/>
        <div class="col-xs-12">
            <a href="{{ url('/retrieve/password') }}" class="col col-xs-4">Forgot Password ? </a>
            <a href="{{ url('/register')}}" class="col-xs-4">Create an account</a>
        </div>
    {{Form::close()}}
  </div>
</div>
@stop
