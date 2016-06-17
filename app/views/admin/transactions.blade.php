@extends("admin.master")

@section("content")
<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3>All Transactions</h3>
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
    <tr>
      <th>Transaction Id</th>
      <th>Transaction Details</th>
      <th>Transaction Type</th>
      <th>Transaction By</th>
      <th>Transaction Date/Time</th>
      <th>Transaction Status</th>
    </tr>
    @foreach($trans as $tran)
      <tr>
        <td>{{ $tran->Id }}</td>
        <td>{{ $tran->transaction_details}}</td>
        <td>{{ $tran->transaction_type }}</td>
        <td>{{ $tran->transaction_by}}</td>
        <td>{{ $tran->created_at }}</td>
        <td>{{ $tran->transaction_status }}</td>
      </tr>
    @endforeach

  </table>
</div>
@stop
