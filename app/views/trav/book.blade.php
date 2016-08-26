@extends('temp')

@section('content')


  <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="services-wrapper">
            <div>
              <h2>{{ $result['Agency'] }}
              <p class="pull-right">N{{ $result['Price']}} </p></h2>
            </div><br/>

            <div class="row">
                <div class="">
                  <div class="col-xs-6">
                    <h3>Drop Off Location</h3>
                    <p>{{ $result['DropOff_Location']}}</p>
                  </div>
                  <div class="col-xs-6">
                      <h3>Pick Up Location</h3>
                      <p>{{ $result['PickUp_Location']}}</p>
                  </div>
                </div>
            </div>

            <div class="">
              <h3>Take Off Time</h3>
              <p>{{ $result['PickUp_Time']}}</p>
            </div>

            <div class="row">
              <div class="">
                  <div class="col-xs-6">
                    <h3>Number Of Seats</h3>
                    <div class="col-xs-3">
                      <select name="numOfSeats" class="form-control">
                          <option  value="1">1 Seat</option>

                      </select>

                    </div>
                  </div>
              </div>
           </div><br/><br/>

           <div class="row">

             <a href="/result/{{$result['id']}}/pay" class="btn btn-primary col-xs-12">
                     <h4>Proceed<i class="glyphicon glyphicon-next"></i></h4>
               </a>
          </div>
        </div>
    </div>
  </div>

@stop
