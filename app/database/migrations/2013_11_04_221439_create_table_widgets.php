<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableWidgets extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('widgets', function($table){
			$table->increments('id');

			$table->string('name', 45);
			$table->string('config', 300);

			$table->timestamps();
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
		Schema::drop('widgets');
	}

}