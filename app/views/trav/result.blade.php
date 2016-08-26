@extends('temp')

@section('content')


<div class="row">
  @if(count($results) == 0)
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
     <div class="services-wrapper">
        <div><b>No Result Found For {{$location}} To {{$destination}} On {{$travelDate}}</b></div>
    </div>
  </div>

    @if(count($results_suggestion) > 0  )
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
       <div class="services-wrapper">
          <div><b>Suggestions For {{$location}} To {{$destination}} On {{$travelDate}}</b></div>
      </div>
    </div>
    @elseif(count($results_suggestion) == 0)
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
       <div class="services-wrapper">
          <div><b>No Suggestion Found For {{$location}} To {{$destination}} On {{$travelDate}} </b></div>
      </div>
    </div>
    @endif

  @endif


  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  @foreach($results as $result)
     <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="services-wrapper">
            <h4>
                <b>{{ $result["Agency"] }}</b>
                <b class="pull-right">N{{ $result["Price"] }}</b>
            </h4>
            <p> Drop Off Address : {{ $result["DropOff_Location"] }}</p>
            <p>Pick Up Address : {{ $result["PickUp_Location"] }}</p>
            <p>Take Off Time :  {{ $result["PickUp_Time"] }}</p>
            <a href="{{ url('result/'.$result["id"].'/book') }}" class="btn btn-success">Book Now</a>
            <span class="pull-right"><i class="glyphicon glyphicon-help"></i>Help icon</span>
         </div>

     </div>
  @endforeach
</div>

  @if(count($results) == 0)
    <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12">
    @foreach($results_suggestion as $result)
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
           <div class="services-wrapper">
               <h4>*
                   <b>{{ $result["Agency"] }}</b>
                   <b class="pull-right">N{{ $result["Price"] }}</b>
               </h4>
               <p>  <b>{{$result["suggestion_location"]}}</b> To {{$result["suggestion_destination"]}}</p>
               <p> Drop Off Address : {{ $result["DropOff_Location"] }}</p>
               <p>Pick Up Address : {{ $result["PickUp_Location"] }}</p>
               <p>Take Off Date :  {{ $result["pickup_date"] }}</p>
               <p>Take Off Time :  {{ $result["pickup_time"] }}</p>
               <a href="{{ url('result/'.$result["id"].'/book') }}" class="btn btn-success">Book Now</a>
               <span class="pull-right"><i class="glyphicon glyphicon-help"></i>Help icon</span>
            </div>

        </div>
    @endforeach
   </div>
  @endif

</div>
@stop
