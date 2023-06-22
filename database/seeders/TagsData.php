<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TagsData extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 0; $i<15; $i++ )
        {
            $isSuccess = DB::table('tags')->insert([
                'mealId'=>$faker->numberBetween($min = 1, $max = 7),
                'title'=>$faker->realText($maxNbChars = 20, $indexSize = 2),
                'slug'=>$faker->slug()
            ]);
        }
    }
}
