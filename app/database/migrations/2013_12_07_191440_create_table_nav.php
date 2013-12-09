<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableNav extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('nav', function($table){
			$table->increments('id');
			
			$table->integer('page_id');

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
		Schema::drop('nav');
	}

}