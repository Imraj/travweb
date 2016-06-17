@extends('admin.master')

@section('content')
<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3>New travel plan</h3>
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

  

  {{Form::open(array("url"=>"admin/travelplan"))}}

    <div class="">
        <div class="form-group">
          {{Form::label("agency_id","Agency Name")}}
          {{Form::select("agency_id",$agency_options,"",array("class"=>"form-control"))}}
        </div>
        <div class="form-group">
          {{Form::label("location_id","Location ")}}
          {{Form::select("location_id",$location_options,"",array("class"=>"form-control"))}}
        </div>
        <div class="form-group">
          {{Form::label("destination_id","Destination ")}}
          {{Form::select("destination_id",$location_options,"",array("class"=>"form-control"))}}
        </div>
        <div class="form-group">
            {{Form::label("price","Price ")}}
            {{Form::text("price","",array("class"=>"form-control","placeholder"=>"Price "))}}
        </div>
        <div class="form-group col-xs-12">
                {{Form::label("date ","Date ")}}<br/>
                <div class="datepicker fuelux col-xs-6" id="myDatepicker" >

                    <div class="input-group">
                      <input class="form-control" name="pickup_datetime" placeholder="Date Of Travel" id="myDatepickerInput" type="text"/>
                      <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                          <span class="glyphicon glyphicon-calendar"></span>
                          <span class="sr-only">Toggle Calendar</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right datepicker-calendar-wrapper" role="menu">
                          <div class="datepicker-calendar">
                            <div class="datepicker-calendar-header">
                              <button type="button" class="prev"><span class="glyphicon glyphicon-chevron-left"></span><span class="sr-only">Previous Month</span></button>
                              <button type="button" class="next"><span class="glyphicon glyphicon-chevron-right"></span><span class="sr-only">Next Month</span></button>
                              <button type="button" class="title">
                                  <span class="month">
                                    <span data-month="0">January</span>
                                    <span data-month="1">February</span>
                                    <span data-month="2">March</span>
                                    <span data-month="3">April</span>
                                    <span data-month="4">May</span>
                                    <span data-month="5">June</span>
                                    <span data-month="6">July</span>
                                    <span data-month="7">August</span>
                                    <span data-month="8">September</span>
                                    <span data-month="9">October</span>
                                    <span data-month="10">November</span>
                                    <span data-month="11">December</span>
                                  </span> <span class="year"></span>
                              </button>
                            </div>
                            <table class="datepicker-calendar-days">
                              <thead>
                              <tr>
                                <th>Su</th>
                                <th>Mo</th>
                                <th>Tu</th>
                                <th>We</th>
                                <th>Th</th>
                                <th>Fr</th>
                                <th>Sa</th>
                              </tr>
                              </thead>
                              <tbody></tbody>
                            </table>
                            <div class="datepicker-calendar-footer">
                              <button type="button" class="datepicker-today">Today</button>
                            </div>
                          </div>
                          <div class="datepicker-wheels" aria-hidden="true">
                            <div class="datepicker-wheels-month">
                              <h2 class="header">Month</h2>
                              <ul>
                                <li data-month="0"><button type="button">Jan</button></li>
                                <li data-month="1"><button type="button">Feb</button></li>
                                <li data-month="2"><button type="button">Mar</button></li>
                                <li data-month="3"><button type="button">Apr</button></li>
                                <li data-month="4"><button type="button">May</button></li>
                                <li data-month="5"><button type="button">Jun</button></li>
                                <li data-month="6"><button type="button">Jul</button></li>
                                <li data-month="7"><button type="button">Aug</button></li>
                                <li data-month="8"><button type="button">Sep</button></li>
                                <li data-month="9"><button type="button">Oct</button></li>
                                <li data-month="10"><button type="button">Nov</button></li>
                                <li data-month="11"><button type="button">Dec</button></li>
                              </ul>
                            </div>
                            <div class="datepicker-wheels-year">
                              <h2 class="header">Year</h2>
                              <ul></ul>
                            </div>
                            <div class="datepicker-wheels-footer clearfix">
                              <button type="button" class="btn datepicker-wheels-back"><span class="glyphicon glyphicon-arrow-left"></span><span class="sr-only">Return to Calendar</span></button>
                              <button type="button" class="btn datepicker-wheels-select">Select <span class="sr-only">Month and Year</span></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div><!--fuelux-->
        </div>
        <div class="form-group">
          {{Form::label("pickup_location","Pickup location ")}}
          {{Form::select("pickup_location",$pklocation_options,"",array("class"=>"form-control"))}}
        </div>

        <div class="form-group">
          {{Form::label("dropoff_location","Drop Off Location ")}}
          {{Form::select("dropoff_location",$pklocation_options,"",array("class"=>"form-control"))}}
        </div>

        <div class="form-group">
            {{Form::submit("Add Travel Plan",array("class"=>"btn btn-success col-xs-5"))}}
        </div>
    </div>
  </div>
@stop
