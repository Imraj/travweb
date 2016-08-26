@extends('temp')

@section('content')
<div class="row animate-in" data-anim-type="fade-in-up">
    <div class="col col-xs-3"></div>
    <div class="col-xs-6">
  {{Form::open(array("url"=>"/update_password"))}}

    <div class="form-group">
      {{ Form::label("former_pwd","Old Password") }}
      {{ Form::password("former_pwd",array("class"=>"form-control","placeholder"=>"Your Former Password","required"=>"true")) }}
    </div>

    <div class="form-group">
      {{ Form::label("new_pwd","New Password") }}
      {{ Form::password("new_pwd",array("class"=>"form-control","placeholder"=>"Your New Password","required"=>"true")) }}
    </div>

    <div class="form-group">
      {{ Form::label("new_pwd_again","New Password Again") }}
      {{ Form::password("new_pwd_again",array("class"=>"form-control","placeholder"=>"Your New Password Again","required"=>"true")) }}
    </div>

    <div class="form-group">
      {{Form::submit("Update Password",array("class"=>"btn btn-success"))}}
    </div>

  {{Form::close()}}
  </div>
  </div>
</div>
@stop
