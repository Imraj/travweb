<?php
  class CarsTableSeeder extends Seeder
  {
    public function run()
    {
      DB::table('cars')->insert([
        ['agency_id'=>"1","car_number"=>"ETY556","car_info"=>"Car 0001"]
      ]);
    }
  }
 ?>
