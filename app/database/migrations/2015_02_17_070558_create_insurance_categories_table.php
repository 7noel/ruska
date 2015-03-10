<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInsuranceCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('insurance_categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',100);
			$table->integer('use_type_id')->unsigned();
			$table->string('alias',15);
			$table->foreign('use_type_id')->references('id')->on('use_types');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('insurance_categories');
	}

}
