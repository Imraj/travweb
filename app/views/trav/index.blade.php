@extends('master')

@section('content')




    {{Form::open(array("url"=>"/result","class"=>"form-horizontal","id"=>"selForm"))}}

        <div class="row">

          <div class="col-xs-12 col-md-12">

            <div class="col-xs-12 col-md-3">
                  <label>Where do we start from ? </label>
                {{Form::text("location","",array("id"=>"geocomplete1" ,"class"=>"form-control","placeholder"=>" From...","required"=>true))}}
            </div>

            <div class="col-xs-12 col-md-3">
                <label>Where do we go to ?</label>
                {{Form::text("destination","",array("id"=>"geocomplete2","class"=>"form-control","placeholder"=>" To... ","required"=>true))}}
            </div>

            <div class="col-xs-12 col-md-2" style="">
                <label>When do we start?</label>
                <!--<input type="date" class="form-control" name="date_time" placeholder="Travel Date"/>-->
                <!-- Date Picker Starts -->
                <div class="datepicker fuelux" id="myDatepicker" >

                    <div class="input-group">
                      <input class="form-control" name="date_time" placeholder="month/day/year" id="myDatepickerInput" type="text"/>
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

                <!-- Date Picker Ends -->
            </div>
            <!--<div class="col-xs-12 col-md-1">
                <label>Seats</label>
                <select class="form-control" name="pax">
                    <option>1</option>

                </select>
            </div>-->
            <div class="col-xs-12 col-md-4" style="margin-top:1.7em;">
              {{Form::submit("Search",array("id"=>"find","class"=>"btn btn-success col-xs-12 col-md-4" ))}}
            </div>
          </div>
        </div>



    {{Form::close()}}

@stop
