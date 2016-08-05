<?php

use App\Comment;
use Illuminate\Database\Seeder;
use App\Post;
use Faker\Factory as Faker;

class CommentsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
    	foreach (range(1,50) as $index) {
            $post = Post::orderByRaw("RAND()")->first();
            $user = User::orderByRaw("RAND()")->first();
	        DB::table('comments')->insert([
                'post_id'       => $post->id,
                'user_id'       => $user->id,
                'title'         => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'content'       => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'status'        => $faker->boolean,
                'created_at'    => $faker->dateTime(),
	        ]);
        }
    }

}
