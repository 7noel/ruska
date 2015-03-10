<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('models', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',30);
			$table->boolean('have_gps');
			$table->integer('brand_id')->unsigned();
			$table->integer('vehicle_type_id')->unsigned();
			$table->integer('insurance_category_id')->unsigned()->nullable();
			
			$table->foreign('brand_id')->references('id')->on('brands');
			$table->foreign('vehicle_type_id')->references('id')->on('vehicle_types');
			$table->foreign('insurance_category_id')->references('id')->on('insurance_categories');
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
		Schema::drop('models');
	}

}
