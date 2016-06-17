@extends('master')

@section('content')
  <div class="container" style="margin-top:10em;">


        {{Form::open(array())}}
          <div class="row">
             <div class="col-xs-3"></div>
             <div class="form-group col-xs-5">
               {{Form::email("emailAddress","",array("class"=>"form-control","required"=>true,"placeholder"=>"Enter your email address"))}}
             </div>
         </div>
         <div class="row">
              <div class="col-xs-3"></div>
           <div class="form-group col-xs-5">
             {{Form::submit("Retrieve My Password",array("class"=>"btn btn-success col-xs-12"))}}
           </div>
        </div>
        {{Form::close()}}
        <div class="row">
            <div class="col-xs-3"></div>
            <div class="col-xs-5">
              <a href="{{ url('/login')}}">  Back</a>
           </div>
        </div>
  </div>
@stop
