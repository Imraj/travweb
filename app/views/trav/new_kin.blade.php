@extends('temp')

  @section('content')

  <div class="row animate-in" data-anim-type="fade-in-up" >
      <div class="col col-xs-3"></div>
      <div class="col-xs-6">
    {{Form::open(array("url"=>"/update_kin"))}}

      <div class="form-group">
        {{ Form::label("next_kin_fullname","Next Of Kin Full Name") }}
        {{ Form::text("next_kin_fullname","",array("class"=>"form-control","required"=>"true","placeholder"=>"Next Of Kin Full Name")) }}
      </div>

      <div class="form-group">
        {{ Form::label("next_kin_phoneNo","Next Of Kin Phone Number") }}
        {{ Form::text("next_kin_phoneNo","",array("class"=>"form-control","required"=>"true","placeholder"=>"Next Of Kin Phone Number")) }}
      </div>

      <div class="form-group">
        {{Form::submit("Update Next Of Kin's Details",array("class"=>"btn btn-success"))}}
      </div>

    {{Form::close()}}
    </div>
    </div>
  </div>

  @stop
</div>
