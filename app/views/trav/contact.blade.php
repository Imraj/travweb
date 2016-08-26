@extends("temp")

@section("content")

<div class="row" style="margin-top:5%;">
    
        
        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
        {{ Form::open() }}
            <div class="form-group">
              {{Form::text("title","",array("class"=>"form-control","placeholder"=>"Message Title"))}}
            </div>
            <div class="form-group">
              {{Form::textarea("message","",array("class"=>"form-control","placeholder"=>"What do you have for us?"))}}
            </div>
            <div class="form-group">
              {{Form::submit("Send",array("class"=>"btn btn-success col-xs-12"))}}
            </div>
        {{Form::close()}}
      </div>
      <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
        
        <p>
          <h4>Email Address :</h4>
          <h4> contact@trav.com.ng</h4>
        </p><br/>
        
      </div>
    
</div>

<div class="col-xs-12 col-sm-12 col-lg-12 col-md-12">

    <div class="col-xs-12 col-sm-8 col-lg-8 col-md-8">
       
    </div>
       
  </div>

@stop
