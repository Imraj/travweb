<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgenciesBookingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("agencies",function($table){
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('logo_path');
            $table->string('url');
        });

        Schema::create("places",function($table){
            $table->increments('id');
            $table->string('name');
        });

        Schema::create("travelplans",function($table){
           $table->increments('id');
           $table->integer('agency_id')->references('id')->on('agencies');
           $table->integer('location_id')->references('id')->on('places');
           $table->integer('destination_id')->references('id')->on('places');
           $table->double('price');
           $table->datetime('pickup_datetime');
           $table->integer('pickup_location')->references('id')->on('pklocations');
        });

        Schema::create("cars",function($table){
            $table->increments('id');
            $table-> integer('agency_id')->references('id')->on('agencies');
            $table->string("car_number");
            $table->text("car_info");
        });

				//Table Pick Up Locations
        Schema::create('pklocations',function($table){
            $table->increments('id');
            $table->integer('agency_id')->references('id')->on("agencies");
            $table->text('location_name');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
			  Schema::drop("agencies");
        Schema::drop("travelplans");
        Schema::drop("places");
        Schema::drop("pickup_locations");
				Schema::drop("cars");
	}

}
