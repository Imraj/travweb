@extends('admin.master')

@section('content')
<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3>All Agencies</h3>
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

  <table class="table">
      <thead>
        <th>S/N</th>
        <th>Logo</th>
        <th>Name</th>
        <th>Url</th>
        <th></th>
        <th></th>
      </thead>
      <tbody>
        @foreach($agencies as $agency)
          <tr>
            <td>{{ $agency->id }}</td>
            <td>

                <img src="{{ storage_path() .'/Alogos/'.$agency->logo_path }}" class="col-xs-2"  />

            </td>
            <td>
                {{$agency->name}}
            </td>
            <td>
                {{$agency->url}}
            </td>
            <td>
                <a href="/admin/agency/{{$agency->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
            </td>
            <td>
                <a href="/admin/agency/{{$agency->id}}/destroy" class="btn btn-warning">Delete</a>
            </td>
         </tr>
        @endforeach
      </tbody>
  </table>


  </div>
@stop
