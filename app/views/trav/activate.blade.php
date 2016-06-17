@extends('master')

@section('content')

<div class="container">
  <div class="col-xs-12 col-md-12 col-lg-12">
     <div class="col-xs-3 col-md-3 col-lg-3"></div>
     <div class="col-xs-6 col-md-6 col-lg-6" style="margin-top:12em;">
          {{Form::open()}}
          <div class="form-group">
              <label>Activation Code</label>
              {{Form::text("code","",array("class"=>"form-control col-md-12","placeholder"=>"Enter the activation code sent your phone number"))}}
           </div><br/><br/>
           <div class="form-group">
              {{Form::submit("Activate My Account",array("class"=>"btn btn-success col-md-12"))}}
           </div>
          {{Form::close()}}
     </div>
      <div class="col-xs-3 col-md-3 col-lg-3"></div>
   </div>
</div>

@stop
