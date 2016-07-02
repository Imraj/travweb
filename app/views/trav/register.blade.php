@extends('master')



@section('content')

<div class="row animate-in" style="margin-top:7em;" data-anim-type="fade-in-up">
   <div class="col col-xs-3"></div>
   <div class="col col-xs-6">
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
        </div>

    {{Form::close()}}
  </div>
</div>
@stop
