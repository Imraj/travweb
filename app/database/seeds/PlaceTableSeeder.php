<?php
  class PlaceTableSeeder extends Seeder
  {
    public function run()
    {
      DB::table("places")->insert([
        ["name"=>"Ogbomoso"],
        ["name"=>"Port-Harcourt"],
        ["name"=>"Ikeja"]
      ]);
    }
  }
 ?>
