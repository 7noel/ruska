<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Sales\Entities\Entity;

class EntityTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('entities')->delete();
		Entity::create([
			'id'=>1,
			'name'=>'RUSKA Y ASOCIADOS CORREDORES DE SEGUROS',
		]);
		Entity::create([
			'id'=>2,
			'name'=>'CAJA MUNICIPAL DE AHORRO Y CRÉDITO HUANCAYO'
		]);
	}

}