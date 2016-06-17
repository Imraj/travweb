@extends('admin.master')

@section('content')
<div class="right_col" role="main">

  <!-- top tiles -->
  <div class="row tile_count">
    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
      <div class="left"></div>
      <div class="right">
        <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
        <div class="count">2500</div>
        <span class="count_bottom"><i class="green">4% </i> From last Week</span>
      </div>
    </div>
    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
      <div class="left"></div>
      <div class="right">
        <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
        <div class="count">123.50</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
      </div>
    </div>

    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
      <div class="left"></div>
      <div class="right">
        <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
        <div class="count">2,315</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
      </div>
    </div>
    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
      <div class="left"></div>
      <div class="right">
        <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
        <div class="count">7,325</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
      </div>
    </div>

  </div>
  <!-- /top tiles -->


  <br />



  <div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Recent Activities <small>Sessions</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <!--<li><a class="close-link"><i class="fa fa-close"></i></a>-->
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="dashboard-widget-content">

            <ul class="list-unstyled timeline widget">
              <li>
                @foreach($activities as $activity)
                <div class="block">
                  <div class="block_content">
                    <h2 class="title">
                        <a>{{ $activity->type }}</a>
                    </h2>
                    <div class="byline">
                      <span>{{ $activity->created_at }}</span> by <a>{{ $activity->activity_by}}</a>
                    </div>
                    <p class="excerpt">
                      {{ $activity->details }}
                    </p>
                  </div>
                </div>
                @endforeach
              </li>

            </ul>
          </div>
        </div>
      </div>
    </div>


    <div class="col-md-4 col-sm-4 col-xs-4">

      <div class="row">


        <!-- Start to do list -->
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>To Do List <small>Sample tasks</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                  </ul>
                </li>
                <!--<li><a class="close-link"><i class="fa fa-close"></i></a>-->
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <div class="">
                <ul class="to_do">

                  @foreach($todos as $todo)

                    <li>
                      <p>
                        <input type="checkbox" class="flat"> {{ $todo->task }}</p>
                    </li>

                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- End to do list -->
      </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-4">

      <div class="row">


        <!-- agencies list -->
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Agencies </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                  </ul>
                </li>
                <!--<li><a class="close-link"><i class="fa fa-close"></i></a>-->
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <div class="">
                <ul class="to_do">
                  @foreach($agencies as $agency)
                  <li>
                      <p>
                         {{ $agency->name}}
                       </p>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- End to do list -->
      </div>
    </div>

  </div>

@stop
