@extends('master')

@section('content')
<div class="row animate-in" data-anim-type="fade-in-up" style="margin-top:7em;">
    <div class="col col-xs-3"></div>
    <div class="col-xs-6">
  {{Form::open(array("url"=>"/update_email"))}}

    <div class="form-group">
      {{ Form::label("former_email") }}
      {{ Form::text("former_email","",array("class"=>"form-control","required"=>"true","placeholder"=>"Your Former Email Address")) }}
    </div>

    <div class="form-group">
      {{ Form::label("new_email") }}
      {{ Form::text("new_email","",array("class"=>"form-control","required"=>"true","placeholder"=>"Your New Email Address")) }}
    </div>

    <div class="form-group">
      {{Form::submit("Update Email Address",array("class"=>"btn btn-success"))}}
    </div>

  {{Form::close()}}
  </div>
  </div>
</div>
@stop
