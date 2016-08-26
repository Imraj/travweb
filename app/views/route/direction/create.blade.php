@extends('route.master')

@section('content')

<script src="{{asset('assets/js/d3.min.js')}}"></script>


<div class="right_col" role="main">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="col-md-7 col-sm-7 col-xs-12">
           {{Form::open()}}
              <div class="form-group">
                <label>State</label>
                {{Form::select("state",$state_options,"",array("class"=>"form-control"))}}
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <label>From</label>
                    {{Form::select("location",$place_options,"",array("class"=>"form-control"))}}
                  </div>
                  <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <label>Final Destination</label>
                    {{Form::select("finaldestination",$place_options,"",array("class"=>"form-control"))}}
                  </div>
              </div>
           {{Form::close()}}

           <hr/>
        <div id="mdata">
            
        </div>   

      </div> 
      <div class="col-md-5 col-sm-5 col-xs-12" id="midPointObj">
              <button class="btn btn-primary col-xs-12 col-md-12 col-lg-12 col-sm-12" id="save-direction">Save / Submit</button>
             
              <button class="btn btn-primary col-xs-12 col-md-12 col-lg-12 col-sm-12" id="new-midpoint">New Mid-Point/Stop-Over</button>
             
              <div id="obj" name="placer[]">
                    <ul class="nav navbar-right panel_toolbox">
                          <li id="collapse-place-chevron">
                            <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>     
                    </ul>
                    <label>Place : </label>
                    <div id="obj-form-input">
                        <div class="form-group">
                            
                              <!--Yaba-->
                            {{Form::select("place",$place_options,"",array("class"=>"form-control"))}}
                        </div>
                        <div id="place-obj">
                            <div class="form-group">
                              {{Form::text("address","",array("class"=>"form-control","placeholder"=>"Landmark/Address"))}}
                            </div>
                            <div class="form-group">
                              {{Form::select("vtype",$vehicle_options,"",array("class"=>"form-control","placeholder"=>"Vehicle Type"))}}
                            </div>
                            <div class="form-group">
                              {{Form::text("price","",array("class"=>"form-control","placeholder"=>"Price"))}}
                            </div>
                            <div class="form-group">
                              {{Form::text("time","",array("class"=>"form-control","placeholder"=>"How long in minutes?"))}}
                            </div>
                            <hr/>
                        </div>
                    </div>
              </div>
             
              

        </div>

      </div>
    </div>


    <script>
      var colors = ["red","orange","yellow","green","blue","indigo","violet","black"]
      var section = d3.select("div#mdata");
      //section.text("Yaba------>Midpoint 1---->Midpoint 2---->Lekki");
      var svg = section.append("svg").attr("height",500);

      
      svg.append("line")
                  .attr("x1",200)
                  .attr("y1",30)
                  .attr("x2",200)
                  .attr("y2",400)
                  .attr("stroke","red")
                  .attr("stroke-width",10);
      svg.append("circle").attr("r",10).attr("cx",200).attr("cy",30).attr("fill","orange");

      svg.append("circle").attr("r",10).attr("cx",200).attr("cy",400).attr("fill","green");
     

    </script>
    <script>
        $(document).ready(
            function(){

              var template='<div name="placer[]" id="obj"><ul class="nav navbar-right panel_toolbox"><li id="collapse-placer-chevron"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li><li id="delete-placer"><a class="close-link"><i class="fa fa-close"></i></a></li></ul><div id="obj-form-input"><div class="form-group"><label>Place:</label>{{Form::select("place",$place_options,"",array("class"=>"form-control"))}}</div><div id="place-obj"><div class="form-group">{{Form::text("address","",array("class"=>"form-control","placeholder"=>"Landmark/Address"))}}</div><div class="form-group">{{Form::select("vtype",$vehicle_options,"",array("class"=>"form-control","placeholder"=>"Vehicle Type"))}}</div><div class="form-group">{{Form::text("price","",array("class"=>"form-control","placeholder"=>"Price"))}}</div><div class="form-group">{{Form::text("time","",array("class"=>"form-control","placeholder"=>"How long in minutes?"))}}</div><hr/></div></div></div>';
              
              //var template = "<div name='placer[]'> sample template <button id='sample-btn'>SBT</button>  </div>"
              var number_of_midpoints = 0;


              $("#new-midpoint").click(function()
              {
                 $("#midPointObj").append(template);
                 number_of_midpoints = number_of_midpoints + 1;
                 svg.append("circle").attr("r",10).attr("cx",200).attr("cy",number_of_midpoints * 100).attr("fill","orange");
                 
              })
              $("#collapse-place-chevron").click(function(){
                        $("#place-obj").toggle();
                        //alert("place-added")
              })

              $("#midPointObj").on("click","#collapse-placer-chevron",function(e){
                e.preventDefault();
                $(this).closest("div").find("#place-obj").toggle();
                
              })

              $("#midPointObj").on("click","#delete-placer",function(e){
                  e.preventDefault();
                  $(this).closest("div#obj").remove();
              })
            
              $("#save-direction").click(function(){
                //alert("save-direction");
              })
            }
        );
    </script>
    
@stop

