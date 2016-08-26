@extends('route.master')

@section('content')
<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3>New Place</h3>
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

  {{Form::open(array("url"=>"route/location"))}}

    <div class="col-xs-5">
          <div class="form-group">
                <label>State</label>
                {{Form::select("state",$state_options,"",array("class"=>"form-control")) }}
          </div>
    
          <div class="form-group">
              {{Form::text("name","",array("class"=>"form-control","placeholder"=>"Place Name"))}}
          </div>

          {{Form::submit("Add Place",array("class"=>"btn btn-success col-xs-5"))}}
        </div>
    </div>
  </div>
@stop
