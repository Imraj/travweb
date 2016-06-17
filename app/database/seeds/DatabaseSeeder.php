<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
			//$this->call('CarsTableSeeder');
			//$this->call("PlaceTableSeeder");
			$this->call("TravelsTableSeeder");
		// $this->call('UserTableSeeder');
		//$this->call('AgencyTableSeeder');
	}

}
