<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDropoffLocationToTravelplans extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table("travelplans",function($table){
			$table->integer("dropoff_location")->references("id")->on("pklocations");
			$table->integer("pickup_location")->references("id")->on("pklocations");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
