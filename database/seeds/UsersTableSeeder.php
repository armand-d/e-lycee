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
    		$rand = rand (1, 2);
    		switch ($rand) {
    			case 1:
    				$role = 'teacher';
    				break;
    			case 2:
    				$role = 'student';
    				break;
    			default:
    				$role = 'teacher';
    				break;
    		}
            $level = NULL;
            if ($role != 'teacher') {
                $rand = rand (1, 3);
                switch ($rand) {
                    case 1:
                        $level = 'Seconde';
                        break;
                    case 2:
                        $level = 'Première';
                        break;
                    case 3:
                        $level = 'Terminale';
                        break;
                    default:
                        $level = NULL;
                        break;
                }
            }
	        DB::table('users')->insert([
				'username'       => $name,
				'password'       => Hash::make($name),
				'role'           =>	$role,
                'level'          => $level,
                'url_avatar'     => $faker->imageUrl,
				'remember_token' => str_random(10),
				'created_at'     => $faker->dateTime(),
	        ]);
        }
        DB::table('users')->insert(
            [
                [
                    'username'       => 'armand',
                    'password'       => Hash::make('armand'),
                    'role'           => 'teacher',
                    'url_avatar'     => $faker->imageUrl,
                    'remember_token' => str_random(10),
                    'created_at'     => $faker->dateTime()
                ],
                [
                    'username'       => 'quentin',
                    'password'       => Hash::make('quentin'),
                    'role'           => 'teacher',
                    'url_avatar'     => $faker->imageUrl,
                    'remember_token' => str_random(10),
                    'created_at'     => $faker->dateTime()
                ],
            ]

        );
    }

}
