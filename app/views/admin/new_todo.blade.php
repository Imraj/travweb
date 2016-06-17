@extends('admin.master')

@section('content')
<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3>New Task</h3>
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
    {{ Form::open(array("url"=>"admin/todo")) }}

        <div class="form-group">
            {{ Form::text("task","",array("class"=>"form-control","placeholder"=>"Task name")) }}
        </div>

        <div class="form-group">
            {{ Form::text("deadline","",array("class"=>"form-control","placeholder"=>"Task deadline")) }}
        </div>

        <div class="form-group">
            {{Form::submit("Add Task",array("class"=>"btn btn-success col-xs-5"))}}
        </div>

    {{Form::close()}}
</div>
@stop
