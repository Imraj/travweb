@extends('master')

@section('content')
<div class="row animate-in" data-anim-type="fade-in-up" style="margin-top:7em;">
    <div class="col col-xs-3"></div>
    <div class="col-xs-6">

    @if($errors->has())
      <div class="alert alert-warning">
        @foreach($errors->all() as $error)
          {{$error}}<br/>
        @endforeach
      </div>
    @endif

  {{Form::open(array("url"=>"/reset/password"))}}
    <input type="hidden" value="{{$code}}" name="code"/>

    <div class="form-group">
      {{ Form::label("new password","New Password") }}
      {{ Form::password("new_password",array("class"=>"form-control","placeholder"=>"Your New Password","required"=>"true")) }}
    </div>

    <div class="form-group">
      {{ Form::label("confirm password","New Password Again") }}
      {{ Form::password("confirm_new_password",array("class"=>"form-control","placeholder"=>"Your New Password Again","required"=>"true")) }}
    </div>

    <div class="form-group">
      {{Form::submit("Update Password",array("class"=>"btn btn-success"))}}
    </div>

  {{Form::close()}}
  </div>
  </div>
</div>
@stop
