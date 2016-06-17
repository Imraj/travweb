@extends('admin.master')

@section('content')
<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3>New pick-up / drop-off location</h3>
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

  {{Form::open(array("url"=>"admin/pklocation"))}}

    <div class="">
        <div class="form-group">
          {{Form::label("agency_id","Agency Name")}}
          {{Form::select("agency_id",$agency_options,"",array("class"=>"form-control"))}}
        </div>

        <div class="form-group">
          {{Form::text("location_name","",array("class"=>"form-control","placeholder"=>"Location Name")) }}
        </div>

        <div class="form-group">
          {{Form::text("location_address","",array("class"=>"form-control","placeholder"=>"Location Address")) }}
        </div>

        <div class="form-group">

          {{Form::submit("Add Place",array("class"=>"btn btn-success col-xs-5"))}}
        </div>
    </div>
  </div>
@stop
