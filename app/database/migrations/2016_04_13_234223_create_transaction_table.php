<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration {

	public function up()
	{
		Schema::create("transactions",function($table){
				$table->increments("Id");
				$table->string("transaction_name");
				$table->string("transaction_details");
				
		});
	}

	public function down()
	{
		Schema::drop("transactions");
	}

}
