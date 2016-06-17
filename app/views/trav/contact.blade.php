@extends("master")

@section("content")

<div class="col-sm-12 col-lg-12 col-xs-12 col-md-12">
    <div class="">
        <h2>Meet Us</h2>
        <div class="col-xs-7">
        {{ Form::open() }}
            <div class="form-group">
              {{Form::text("title","",array("class"=>"form-control","placeholder"=>"Message Title"))}}
            </div>
            <div class="form-group">
              {{Form::textarea("message","",array("class"=>"form-control","placeholder"=>"What do you have for us?"))}}
            </div>
            <div class="form-group">
              {{Form::submit("Send Message",array("class"=>"btn btn-primary col-xs-12"))}}
            </div>
        {{Form::close()}}
      </div>
      <div class="col-xs-5">
        <p><h4>Call Us :</h4>
          <h4> +234 903 344 9024</h4>
          <h4> +234 801 353 2829</h4>
        </p><br/>
        <p>
          <h4>Email Address :</h4>
          <h4> contact@trav.com.ng</h4>
        </p><br/>
        <p>
          <h4>Contact Address:</h4>
          <h4>233,Test Street House, Test Address,Yaba,
             Oyo State.
          </h4>
        </p>
      </div>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-lg-12 col-md-12">

    <div class="col-xs-12 col-sm-8 col-lg-8 col-md-8">
        <h2>About Us</h2>
        <p>
          lorem ipsum lorem ipsum  lorem ipsum lorem ipsum
          lorem ipsum lorem ipsum  lorem ipsum lorem ipsum
          lorem ipsum lorem ipsum  lorem ipsum lorem ipsum
          lorem ipsum lorem ipsum  lorem ipsum lorem ipsum
          lorem ipsum lorem ipsum  lorem ipsum lorem ipsum
          lorem ipsum lorem ipsum  lorem ipsum lorem ipsum
          lorem ipsum lorem ipsum  lorem ipsum lorem ipsum
          lorem ipsum lorem ipsum  lorem ipsum lorem ipsum
          lorem ipsum lorem ipsum  lorem ipsum lorem ipsum
          lorem ipsum lorem ipsum  lorem ipsum lorem ipsum
          lorem ipsum lorem ipsum  lorem ipsum lorem ipsum
          lorem ipsum lorem ipsum  lorem ipsum lorem ipsum
          lorem ipsum lorem ipsum  lorem ipsum lorem ipsum
          lorem ipsum lorem ipsum  lorem ipsum lorem ipsum
          lorem ipsum lorem ipsum  lorem ipsum lorem ipsum
          lorem ipsum lorem ipsum  lorem ipsum lorem ipsum
          lorem ipsum lorem ipsum  lorem ipsum lorem ipsum
          lorem ipsum lorem ipsum  lorem ipsum lorem ipsum
          lorem ipsum lorem ipsum  lorem ipsum lorem ipsum
          lorem ipsum lorem ipsum  lorem ipsum lorem ipsum
          lorem ipsum lorem ipsum  lorem ipsum lorem ipsum
          lorem ipsum lorem ipsum  lorem ipsum lorem ipsum
          lorem ipsum lorem ipsum  lorem ipsum lorem ipsum
          lorem ipsum lorem ipsum  lorem ipsum lorem ipsum
        </p>
  </div>

@stop
