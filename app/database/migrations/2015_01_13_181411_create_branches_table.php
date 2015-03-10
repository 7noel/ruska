<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBranchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('branches', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('address');
			$table->integer('ubigeo_id')->unsigned();
			$table->string('administrator');
			$table->integer('entity_id')->unsigned();
			
			$table->foreign('ubigeo_id')->references('id')->on('ubigeos');
			$table->foreign('entity_id')->references('id')->on('entities');

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
		Schema::drop('branches');
	}

}
