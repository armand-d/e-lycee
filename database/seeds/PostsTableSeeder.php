<?php

use App\Post;
use App\User;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
    	foreach (range(1,30) as $index) {
            $user = User::orderByRaw("RAND()")->first();
	        DB::table('posts')->insert([
                'user_id'       => $user->id,
                'title'         => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'abstract'      => '',
                'content'       => $faker->paragraph($nbSentences = 9, $variableNbSentences = true),
                'url_thumbnail' => $faker->imageUrl,
                'status'        => $faker->boolean,
                'created_at'    => $faker->dateTime(),
	        ]);
        }
    }

}
