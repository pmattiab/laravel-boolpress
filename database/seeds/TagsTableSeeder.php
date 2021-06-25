<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            "vegano",
            "vegetariano",
            "senza glutine",
            "classici",
            "finger food",
            "facili e veloci",
            "piccola pasticceria"
        ];

        foreach ($tags as $tag_name) {

            $tag = new Tag();
            $tag->name = $tag_name;
            $tag->slug = Str::slug($tag->name, "-");
            $tag->save();
        }
    }
}
