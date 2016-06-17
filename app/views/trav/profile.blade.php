@extends("master")

@section("content")

<div class="container ">
 <h2>Profile</h2>
  <div class="col-sm-12 col-lg-12 col-xs-12 col-md-12">
      <div class="">

        <div class="col-sm-12 col-lg-12 col-xs-12 col-md-12 services-wrapper">
            <div class="col-sm-6 col-lg-6 col-xs-6 col-md-6">
              <b>Full Name : </b> {{ $user->fullName }}
            </div>
            <div class="col-sm-3 col-lg-3 col-xs-3 col-md-3">

            </div>
        </div>
        <br/><br/><br/>
        <div class="col-sm-12 col-lg-12 col-xs-12 col-md-12 services-wrapper">
            <div class="col-sm-6 col-lg-6 col-xs-6 col-md-6">
              <b>Phone Number : </b> {{ $user->phoneNumber }}
            </div>
            <div class="col-sm-3 col-lg-3 col-xs-3 col-md-3">
              <a href="/edit_phoneNo" class="btn btn-primary">Edit Phone Number</a>
            </div>
        </div>
          <br/><br/><br/>
        <div class="col-sm-12 col-lg-12 col-xs-12 col-md-12 services-wrapper">
            <div class="col-sm-6 col-lg-6 col-xs-6 col-md-6">
              <b>Email Address : </b> {{ $user->emailAddress }}
            </div>
            <div class="col-sm-3 col-lg-3 col-xs-3 col-md-3">
              <a href="/edit_email" class="btn btn-primary">Edit Email Address</a>
            </div>
        </div>
        <br/><br/><br/>
        <div class="col-sm-12 col-lg-12 col-xs-12 col-md-12 services-wrapper">
            <div class="col-sm-6 col-lg-6 col-xs-6 col-md-6">
              <b>Password : xxxxxxxxxxxxxxxxxxxxxxxxxxx </b>
            </div>
            <div class="col-sm-3 col-lg-3 col-xs-3 col-md-3">
              <a href="/edit_password" class="btn btn-primary">Change Password</a>
            </div>
        </div>
        <div class="col-sm-12 col-lg-12 col-xs-12 col-md-12 services-wrapper">
            <div class="col-sm-6 col-lg-6 col-xs-6 col-md-6">
              <b>Next Of Kin Details </b>
            </div>
            <div class="col-sm-3 col-lg-3 col-xs-3 col-md-3">
              <a href="/edit_kin" class="btn btn-primary">Edit Details</a>
            </div>
        </div>
        <div class="col-sm-12 col-lg-12 col-xs-12 col-md-12 services-wrapper">
            <div class="col-sm-6 col-lg-6 col-xs-6 col-md-6">
              <b>Full Name : </b>
            </div>

        </div>

        <div class="col-sm-12 col-lg-12 col-xs-12 col-md-12 services-wrapper">
            <div class="col-sm-6 col-lg-6 col-xs-6 col-md-6">
              <b>Phone Number : </b>
            </div>

        </div>

      </div>
  </div>
</div>
@stop
