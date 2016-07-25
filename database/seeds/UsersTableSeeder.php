<?php

use App\User;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
    	foreach (range(1,10) as $index) {
    		$name = $faker->userName();
    		$rand = rand (1, 3);
    		switch ($rand) {
    			case 1:
    				$role = 'teacher';
    				break;
    			case 2:
    				$role = 'first_class';
    				break;
    			case 3:
    				$role = 'final_class';
    				break;
    			default:
    				$role = 'teacher';
    				break;
    		}
	        DB::table('users')->insert([
				'username'       => $name,
				'password'       => Hash::make($name),
				'role'           =>	$role,
				'remember_token' => str_random(10),
				'created_at'     => $faker->dateTime(),
	        ]);
        }
    }

}
