<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MealsData extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 0; $i<7; $i++ )
        {
            DB::table('meals')->insert([
                'title'=>$faker->realText($maxNbChars = 10, $indexSize = 2),
                'description'=>$faker->realText($maxNbChars = 50, $indexSize = 2),
                'categoryId'=>$faker->numberBetween($min = 1, $max = 5),
            ]);
        }
    }
}
