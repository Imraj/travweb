<?php
  class TravelsTableSeeder extends Seeder
  {
    public function run()
    {
      /*DB::table("travelplans")->insert([
        ['agency_id'=>2,'location_id'=>1,'destination_id'=>2,'price'=>4000,'pickup_datetime'=>'DateTime.NOW',
          'pickup_location'=>1,'dropoff_location'=>2]
      ]);*/

      DB::table("travelplans")->insert([
        ['agency_id'=>2,'location_id'=>1,'destination_id'=>2,'price'=>5000,'pickup_datetime'=>'DateTime.NOW',
          'pickup_location'=>1,'dropoff_location'=>2]
      ]);

      DB::table("agencies")->insert([
        ["name"=>"FRC",
        "description"=>"FRC is a travelling agency founded in 2009",
        "url"=>"www.frc.com",
        "logo_path"=>"frc.jpg"]
      ]);

      /*DB::table("pklocations")->insert([
        ['agency_id'=>1,"location_name"=>"Alumin Park","location_address"=>"UnderG,Ogbomoso,Oyo State"],
        ['agency_id'=>1,"location_name"=>"Sade Garage","location_address"=>"5,Malomo Street,Port-Harcourt"]
      ]);*/

    }
  }
 ?>
