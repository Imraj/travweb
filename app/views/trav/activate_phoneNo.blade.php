@extends('master')

@section('content')

  {{Form::open(array("url"=>"/activate_phoneNo"))}}
  <div class="form-group">
    {{ Form::label("activation_code") }}
    {{ Form::text("activation_code","",array("class"=>"form-control","required"=>"true","placeholder"=>"Enter your Activation Code")) }}
  </div>
  {{Form::close()}}
@stop
