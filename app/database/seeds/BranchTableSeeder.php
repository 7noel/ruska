<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Sales\Entities\Branch;

class BranchTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('branches')->delete();
		$faker = Faker::create();
		Branch::create([
			'name'=>'RUSKA',
			'address'=>'Calle Ocharán 410 Of. 301',
			'ubigeo_id'=>125614115,
			'administrator'=>'Noel Huillca Huamaní',
			'entity_id'=>1
		]);

		foreach(range(1, 20) as $index)
		{
			Branch::create([
				'name'=>$faker->state,
				'address'=>$faker->address,
				'ubigeo_id'=>$faker->randomElement([12421411,12431412,12441413,12451414,12461415,12471416,12481417,12491418]),
				'administrator'=>$faker->name,
				'entity_id'=>2
			]);
		}
	}

}