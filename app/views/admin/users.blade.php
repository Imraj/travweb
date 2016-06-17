@extends('admin.master')

@section('content')
<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3>All Users</h3>
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
        <th>Full Name</th>
        <th>Phone Number</th>
        <th>Email Address</th>
        <th>Priority Level </th>
        <th>Is Admin?</td>
    </thead>
    <tbody>
  @foreach($users as $user)
    <tr>
        <td> {{ $user->id }}</td>
        <td> {{ $user->fullName}} </td>
        <td> {{ $user->phoneNumber }}</td>
        <td> {{ $user->emailAddress }}</td>
        <td> {{ $user->priority_level}}</td>
        <td> {{ $user->is_admin }}
    </tr>
  @endforeach
  </tbody>
 </table>

</div>
@stop
