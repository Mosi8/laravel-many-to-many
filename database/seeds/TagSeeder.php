<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['carne','vegan','gluten free','pesce'];
        foreach ($tags as $tags_name) {
            $new_tag = new Tag();
            $new_tag->name = $tags_name;
            $new_tag->slug = Str::of($tags_name)->slug("-");
            $new_tag->save();
        }
    }
}
