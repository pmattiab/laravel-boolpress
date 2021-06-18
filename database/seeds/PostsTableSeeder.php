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
        for ($i = 0; $i < 18; $i++) {
            
            $post = new Post();

            $post->title = $faker->word(5, true);
            $post->content = $faker->paragraphs(4, true);
            $post->slug = Str::slug($post->title, "-");

            $post->save();
        }
    }
}
