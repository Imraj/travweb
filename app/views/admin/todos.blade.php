@extends('admin.master')

@section('content')
<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3>ToDo List</h3>
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
        <th>Task</th>
        <th>Deadline</th>

      </thead>
      <tbody>
        @foreach($all_todos as $todo)
          <tr>
            <td>{{ $todo['id'] }}</td>
            <td>{{ $todo['task'] }}</td>
            <td>{{ $todo['deadline']  }}</td>

            <td>
                <a href="/admin/todo/edit/{{$todo['id']}}" class="btn btn-primary btn-sm">Edit</a>
            </td>
            <td>
                <a href="/admin/todo/destroy/{{$todo['id']}}" class="btn btn-warning">Delete</a>
            </td>

         </tr>
        @endforeach
      </tbody>
  </table>


  </div>
@stop
