<?php


  class Transaction extends Eloquent
  {
    public $fillable = ["transaction_name","transaction_details"];
     public $timestamps = [];
  }


?>
