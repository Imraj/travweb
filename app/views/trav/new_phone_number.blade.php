@extends('temp')

  @section('content')

  <div class="row animate-in" data-anim-type="fade-in-up">
      <div class="col col-xs-3"></div>
      <div class="col-xs-6">
    {{Form::open(array("url"=>"/update_phoneNo"))}}

      <div class="form-group">
        {{ Form::label("former_phoneNo","Old Phone Number") }}
        {{ Form::text("former_phoneNo","",array("class"=>"form-control","required"=>"true","placeholder"=>"Your Former Phone Number")) }}
      </div>

      <div class="form-group">
        {{ Form::label("new_phoneNo","New Phone Number") }}
        {{ Form::text("new_phoneNo","",array("class"=>"form-control","required"=>"true","placeholder"=>"Your New Phone Number")) }}
      </div>

      <div class="form-group">
        {{Form::submit("Update Phone Number",array("class"=>"btn btn-success"))}}
      </div>

    {{Form::close()}}
    </div>
    </div>
  </div>

  @stop
</div>
