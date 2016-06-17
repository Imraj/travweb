@extends('admin.master')

@section('content')
<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3>All Pick-up and Drop-off locations</h3>
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
        <th>Agency Name</th>
        <th>Location Name</th>
        <th>Location Address</th>
      </thead>
      <tbody>
        @foreach($all_pklocations as $pklocation)
          <tr>
            <td>{{ $pklocation['id'] }}</td>
            <td>{{ $pklocation['agency_name'] }}</td>
            <td>{{ $pklocation['location_name']  }}</td>
            <td>{{ $pklocation['location_address'] }}</td>
            <td>
                <a href="/admin/pklocation/edit/{{$pklocation['id']}}" class="btn btn-primary btn-sm">Edit</a>
            </td>
            <td>
                <a href="/admin/pklocation/destroy/{{$pklocation['id']}}" class="btn btn-warning">Delete</a>
            </td>
         </tr>
        @endforeach
      </tbody>
  </table>


  </div>
@stop
