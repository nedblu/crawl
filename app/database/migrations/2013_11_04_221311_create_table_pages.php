<?php

use Illuminate\Database\Migrations\Migration;

class CreateTablePages extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('pages', function($table){
			
			$table->increments('id');

			$table->string('name', 50);
			$table->string('title', 50);
			$table->string('link', 100);
			$table->string('keywords', 300);
			$table->integer('layout');
			$table->text('content');
			$table->boolean('status');

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
		Schema::drop('pages');
	}

}