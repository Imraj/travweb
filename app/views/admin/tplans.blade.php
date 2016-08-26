@extends('admin.master')

@section('content')
<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3>All Travel Plans</h3>
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
        <th>Destination Name</th>
        <th>Price</th>
        <th>TakeOff point</th>
        <th>Dropoff point</th>
        <th>TakeOff Date</th>
        <th>TakeOff Time</th>
      </thead>
      <tbody>
        @foreach($all_tplans as $tplan)
          <tr>
            <td>{{ $tplan['id'] }}</td>
            <td>{{ $tplan['agency_name'] }}</td>
            <td>{{ $tplan['location_name']  }}</td>
            <td>{{ $tplan['destination_name'] }}</td>
            <td>{{ $tplan['price'] }}</td>
            <td>{{ $tplan['pickup_location_name']}}, {{ $tplan['pickup_location_address']}}</td>
            <td>{{ $tplan['dropoff_location_name']}}, {{ $tplan['dropoff_location_address']}}</td>
            <td>{{ $tplan['pickup_date'] }}</td>
            <td>{{ $tplan["pickup_time"]}}</td>
            <td>
                <a href="/admin/travelplan/{{$tplan['id']}}/edit" class="btn btn-primary btn-sm">Edit</a>
            </td>
            <td>
                <a href="/admin/travelplan/{{$tplan['id']}}/destroy" class="btn btn-warning">Delete</a>
            </td>
         </tr>
        @endforeach
      </tbody>
  </table>


  </div>
@stop
