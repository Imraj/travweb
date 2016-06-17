@extends("admin.master")



@section('content')
  <div class="right_col" role="main">
    <div class="page-title">
      <div class="title_left">
        <h3>New Agency</h3>
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

    {{Form::open(array("files"=>"true","url"=>"admin/agency"))}}

      <div class="">
          <div class="form-group">
            {{Form::text("name",Input::old("name"),array("class"=>"form-control","placeholder"=>"Agency name"))}}
          </div>

          <div class="form-group">
            {{Form::text("description",Input::old("description"),array("class"=>"form-control","placeholder"=>"Agency Description"))}}
          </div>

          <div class="form-group">
            {{Form::file("logo_path",array("class"=>"form-control","placeholder"=>"Agency Logo"))}}
          </div>

          <div class="form-group">
            {{Form::text("url",Input::old("url"),array("class"=>"form-control","placeholder"=>"Agency Website Url"))}}
          </div>

          <div class="form-group">
            {{Form::submit("Add Agency",array("class"=>"btn btn-success col-xs-5"))}}
          </div>
      </div>
    </div>
    {{Form::close()}}


@stop
