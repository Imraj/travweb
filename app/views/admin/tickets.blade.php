@extends('admin.master')

@section('content')
<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3>All Tickets</h3>
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
        <th>Location</th>
        <th>Destination</th>
        <th>User Id</th>
        <th>Travelplan Id</th>
        <th>Transaction Id</th>
        <th>Ticket Id</th>
        <th>Payment Id</th>
        <th>Token</th>
        <th>Type</th>
    </thead>
    <tbody>
  @foreach($tickets as $ticket)
    <tr>
        <td> {{ $ticket->id }}</td>
        <td> {{ $ticket->location}} </td>
        <td> {{ $ticket->destination }}</td>
        <td> {{ $ticket->user_id }}</td>
        <td> {{ $ticket->travelplan_id}}</td>
        <td> {{ $ticket->transaction_id}}</td>
        <td> {{ $ticket->ticket_id }}</td>
        <td> {{ $ticket->simplepay_id }}</td>
        
    </tr>
  @endforeach
  </tbody>
 </table>

</div>
@stop
