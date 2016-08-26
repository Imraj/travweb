<?php

  class Agency extends Eloquent
  {
    public $fillable = ["name","description","logo_path","url"];

    public $timestamps = [];

    public function Cars()
    {
      return $this->hasMany("Car");
    }

  }

 ?>
