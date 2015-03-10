<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Sales\Entities\User;

class UserTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('users')->delete();
		$faker = Faker::create();

		User::create([
			'username'=>'admin',
			'password'=>123,
			'first_name'=>'Noel',
			'last_name'=>'Huillca Huamaní',
			'email'=>'noel.logan@gmail.com',
			'branch_id'=>1,
			'is_staff'=>true,
			'is_superuser'=>true,

		]);
		User::create([
			'username'=>'user',
			'password'=>123,
			'first_name'=>'Usuario',
			'last_name'=>'del Cotizador Web',
			'email'=>'user.email@prueba.com',
			'branch_id'=>1,
			'is_staff'=>true,
			'is_superuser'=>true,

		]);

		foreach(range(1, 20) as $index)
		{
			$_name = $faker->firstName();
			User::create([
				'username'		=>$_name,
				'password'		=>123,
				'first_name'	=>$_name,
				'last_name'		=>$faker->lastName,
				'email'			=>$faker->email,
				'branch_id'		=>2,
				'is_staff'		=>false,
				'is_superuser'	=>false,

			]);
		}
	}

}