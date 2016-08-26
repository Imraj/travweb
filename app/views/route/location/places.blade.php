@extends('route.master')

@section('content')
<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3>All Places</h3>
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
        <th>Name</th>
        <th>State</th>
        <th>Longitude</th>
        <th>Latitude</th>
      </thead>
      <tbody>
        @foreach($places as $place)
          <tr>
            <td>{{ $place->id }}</td>
            <td>{{ $place->name }}</td>
            <td>{{ $place->longitude}}</td>
            <td>{{ $place->latitude}}</td>
            <td>
                <a href="/admin/place/edit/{{$place->id}}" class="btn btn-primary btn-sm">Edit</a>
            </td>
            <td>
                <a href="/admin/place/destroy/{{$place->id}}" class="btn btn-warning">Delete</a>
            </td>
         </tr>
        @endforeach
      </tbody>
  </table>


  </div>
@stop


@stop
