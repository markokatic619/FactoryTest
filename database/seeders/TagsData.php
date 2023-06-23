<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Tag;
use App\Models\TagTranslation;


class TagsData extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $locales = DB::table('languages')->pluck('language');
        for($i = 0; $i<15; $i++ )
        {
            $tag = Tag::create([
                'mealId'=>$faker->numberBetween($min = 1, $max = 7),
                'slug'=>$faker->slug()
            ]);
            foreach ($locales as $locale) {
                $translation = new TagTranslation();
                $translation->title = $faker->realText($maxNbChars = 10, $indexSize = 2);
                $translation->tagId = $tag->id;
                $translation->locale = $locale;
                $translation->save();
            }
        }
    }
}
