<?php

  class Travelplan extends Eloquent
  {
    public $fillable=["agency_id","location_id","destination_id","price","pickup_date","pickup_time",
                        "dropoff_location","pickup_location"];

     public $timestamps = [];
  }

 ?>
