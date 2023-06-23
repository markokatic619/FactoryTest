<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Ingredient;
use App\Models\IngredientTranslation;
use Illuminate\Support\Facades\DB;

class IngredientsData extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $locales = DB::table('languages')->pluck('language');
        for($i = 0; $i<10; $i++ )
        {        
            $ingredient = new Ingredient();
            $ingredient->slug = $faker->slug();
            $ingredient->save();
            foreach ($locales as $locale) {
                $translation = new IngredientTranslation();
                $translation->title = $faker->realText($maxNbChars = 20, $indexSize = 2);
                $translation->ingredientId = $ingredient->id;
                $translation->locale = $locale;
                $translation->save();
            }
           
        }
    }
}
