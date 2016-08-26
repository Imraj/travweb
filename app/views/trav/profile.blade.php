@extends("temp")

@section("content")

<div class="container ">

  <div class="col-sm-12 col-lg-12 col-xs-12 col-md-12">
      <div class="">
        <div class="col-sm-12 col-lg-12 col-xs-12 col-md-12 services-wrapper">
            <div class="col-sm-12 col-lg-6 col-xs-12 col-md-6">
              <b>User Details </b>
            </div>
            
        </div><br/><br/>
        <div class="col-sm-12 col-lg-12 col-xs-12 col-md-12 services-wrapper">
            <div class="col-sm-12 col-lg-6 col-xs-12 col-md-6">
              <b>Full Name : </b> {{ $user->fullName }}
            </div>
            
        </div>
        <br/><br/>
        <div class="col-sm-12 col-lg-12 col-xs-12 col-md-12 services-wrapper">
            <div class="col-sm-12 col-lg-6 col-xs-12 col-md-6">
              <b>Phone Number : </b> {{ $user->phoneNumber }}
            </div>
            <div class="col-sm-12 col-lg-3 col-xs-12 col-md-3">
              <a href="{{ url('/edit_phoneNo') }}" class="">Edit Phone Number</a>
            </div>
        </div>
          <br/><br/>
        <div class="col-sm-12 col-lg-12 col-xs-12 col-md-12 services-wrapper">
            <div class="col-sm-12 col-lg-6 col-xs-12 col-md-6">
              <b>Email Address : </b> {{ $user->emailAddress }}
            </div>
            <div class="col-sm-12 col-lg-3 col-xs-12 col-md-3">
              <a href="{{ url('/edit_email') }}" class="">Edit Email Address</a>
            </div>
        </div>
        <br/><br/>
        <div class="col-sm-12 col-lg-12 col-xs-12 col-md-12 services-wrapper">
            <div class="col-sm-12 col-lg-6 col-xs-12 col-md-6">
              <b>Password : </b>xxxxx 
            </div>
            <div class="col-sm-12 col-lg-3 col-xs-12 col-md-3">
              <a href="{{ url('/edit_password') }}" class="">Change Password</a>
            </div>
        </div><br/><br/>
        <div class="col-sm-12 col-lg-12 col-xs-12 col-md-12 services-wrapper">
            <div class="col-sm-12 col-lg-6 col-xs-12 col-md-6">
              <b>Next Of Kin Details </b>
            </div>
            <div class="col-sm-12 col-lg-3 col-xs-12 col-md-3">
              <a href="{{ url('/edit_kin') }}" class="">Edit Details</a>
            </div>
        </div>
        <br/><br/>

        <div class="col-sm-12 col-lg-12 col-xs-12 col-md-12 services-wrapper">
            <div class="col-sm-12 col-lg-6 col-xs-12 col-md-6">
              <b>Full Name : </b>
            </div>

        </div>
        <br/><br/>

        <div class="col-sm-12 col-lg-12 col-xs-12 col-md-12 services-wrapper">
            <div class="col-sm-12 col-lg-6 col-xs-12 col-md-6">
              <b>Phone Number : </b>
            </div>

        </div>

      </div>
  </div>
</div>
@stop
