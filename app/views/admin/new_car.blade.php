@extends('admin.master')

@section('content')
<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3>New Car</h3>
    </div>
    <div class="title_right">
      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                </span>
        </div>
      </div>
    </div>
  </div>

  {{Form::open(array("url"=>"admin/car"))}}

    <div class="">
        <div class="form-group">
          {{Form::text("car_number","",array("class"=>"form-control","placeholder"=>"Car Number"))}}
        </div>

        <div class="form-group">
          {{Form::text("car_info","",array("class"=>"form-control","placeholder"=>"Number Of Available Seats")) }}
        </div>

        <div class="form-group">
          {{Form::label("agency_id","This car belongs to ...")}}
          {{Form::select("agency_id",$agency_options,"",array("class"=>"form-control"))}}
        </div>

        <div class="form-group">

          {{Form::submit("Add Car",array("class"=>"btn btn-success col-xs-5"))}}
        </div>
    </div>
  </div>
  {{Form::close()}}
@stop
