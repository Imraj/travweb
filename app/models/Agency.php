<?php

  class Agency extends Eloquent
  {
    public $fillable = ["name","description","logo_path","url"];

    public function Cars()
    {
      return $this->hasMany("Car");
    }

  }

 ?>
