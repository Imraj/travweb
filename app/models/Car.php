<?php

  class Car extends Eloquent
  {

    public $fillable = ["agency_id","car_number","car_info"];
    public $timestamps = [];

    public function Agency()
    {
      return $this->belongsTo("Agency");
    }

  }

 ?>
