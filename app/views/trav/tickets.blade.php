@extends('temp')

@section("content")
  <div class="col-xs-12 col-md-12 col-lg-12">
      

      @foreach($tickets as $ticket)
        <div class="col-xs-6 col-md-6 col-lg-6">
          <div class="services-wrapper">
              <div>{{$ticket["agency"]}}</div>
              <div>{{$ticket["transactionId"]}} | {{$ticket["simplePayId"]}}</div>
              <div>From : {{ $ticket["location"] }}</div>
              <div>To : {{  $ticket["destination"] }}</div>
              <div>{{$ticket["token"]}}</div>
              <a href="{{ url('ticket/'.$ticket['token']) }}">View</a>
         </div>
       </div>

      @endforeach

      

  </div>
@stop
