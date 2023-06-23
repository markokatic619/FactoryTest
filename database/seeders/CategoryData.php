<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Category;
use App\Models\CategoryTranslation;
use Illuminate\Support\Facades\DB;

class CategoryData extends Seeder
{
    public function run(): void
    {
        $locales = DB::table('languages')->pluck('language');
        $faker = Faker::create();
        for($i = 0; $i<5; $i++ )
        {
            $category = Category::create([
                'slug'=>$faker->slug()
            ]);
            foreach ($locales as $locale) {
                $translation = new CategoryTranslation();
                $translation->title = $faker->realText($maxNbChars = 20, $indexSize = 2);
                $translation->locale = $locale;
                $translation->categoryId = $category->id;
                $translation->save();
            }
        }
    }
}
