<?php

    class AgencyTableSeeder extends Seeder
    {
        public function run()
        {
          DB::table("Agencies")->insert([
            "name"=>"Old shall shrink",
            "description"=>"Old shall shrink is a travelling agency founded in 1999",
            "url"=>"www.oss.com",
            "logo_path"=>"oss.jpg"
          ]);
        }
    }

 ?>
