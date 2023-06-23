<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Meal;
use App\Models\MealTranslation;

class MealsData extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $locales = DB::table('languages')->pluck('language');
            foreach (range(0, 6) as $i) {
                $meal = Meal::create([
                    'categoryId' => $faker->numberBetween($min = 1, $max = 5),
                ]);
                foreach ($locales as $locale) {
                    $translation = new MealTranslation();
                    $translation->title = $faker->realText($maxNbChars = 10, $indexSize = 2);
                    $translation->description = $faker->realText($maxNbChars = 50, $indexSize = 2);
                    $translation->locale = $locale;
                    $translation->mealId = $meal->id;
                    $translation->save();
                }
            }
        
    }
}
