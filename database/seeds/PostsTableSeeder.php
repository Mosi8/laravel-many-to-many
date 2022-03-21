<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for ($i=0; $i < 7; $i++) { 
            $post = new Post();
            $post->title = $faker->words(7, true);
            $post->content = $faker->text();
            $post->slug = Str::of($post->title)->slug("-");
            
            $post->save();
        }

    }
}
