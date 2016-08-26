@extends('temp')

@section("content")
  <div class="col-xs-12 col-md-12 col-lg-12">
      
   
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         
              <div>{{$ticket["agency"]}}</div>
              <div>{{$ticket["transactionId"]}} | {{$ticket["simplePayId"]}}</div>
              <div>Full Name : {{$ticket["fullName"]}}</div>
              <div>Phone Number : {{$ticket["phoneNumber"]}}</div>
              <div>{{$ticket["ticketId"]}}</div>
              <div>N{{$ticket["price"]}}</div>
              <div>Date : {{$ticket["date"]}} | {{$ticket["time"]}}</div>
              <div>From : {{ $ticket["location"] }}</div>
              <div>To : {{  $ticket["destination"] }}</div>
              <div>{{$ticket["token"]}}</div>

              
       
       </div>

      

  </div>
@stop
