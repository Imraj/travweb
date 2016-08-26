@extends('temp')

@section('content')

  <div class="container">
      <div class="col-sm-12 col-lg-12 col-xs-12 col-md-12">
        <div class="services-wrapper">
            <h2>Transactions</h2>
            <table class="table">
                <tr>
                  <td>Transaction Id</td>
                  <td>Transaction Details</td>
                  <td>Transaction Date/Time</td>
                  <td>Transaction Status</td>
                </tr>
                <tr>
                  <td>1223</td>
                  <td>Bus Ticket From Ogbomoso to Enugu</td>
                  <td> 12/02/2016 09:30:00 </td>
                  <td><button class="btn btn-success col-xs-7">Complete</button> </td>
                </tr>
                
                <tr>
                  <td>1223</td>
                  <td>Bus Ticket From Ikeja to Edo</td>
                  <td> 12/02/2016 09:30:00 </td>
                  <td><button class="btn btn-danger col-xs-7">Incomplete</button> </td>
                </tr>
            </table>
        </div>
      </div>
  </div>

@stop
