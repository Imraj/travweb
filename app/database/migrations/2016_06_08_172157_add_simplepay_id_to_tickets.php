<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSimplepayIdToTickets extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("simple_pay",function($table){
			$table->string("created");
			$table->boolean("captured");
			$table->string("id");
			$table->string("customer_address_postal");
			$table->string("customer_address");
			$table->string("customer_phone_number");
			$table->string("customer_address_city");
			$table->string("customer_email_address");
			$table->string("customer_id");
			$table->string("customer_address_country");
			$table->string("customer_address_state");
			$table->string("payment_reference");
			$table->string("currency");
			$table->string("response_code");
			$table->string("source_exp_year");
			$table->string("source_last4");
			$table->string("source_brand");
			$table->string("source_is_recurrent");
			$table->string("source_id");
			$table->string("source_exp_month");
			$table->string("funding");
			$table->string("object");
		});

		Schema::table("tickets",function($table){

			$table->string("simplepay_id");

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("Simple_Pay");

		Schema::table("tickets",function($table){
				$table->dropColumn("simplepay_id");
		});
	}

}
