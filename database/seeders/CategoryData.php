<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CategoryData extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 0; $i<5; $i++ )
        {
            DB::table('category')->insert([
                'title'=>$faker->realText($maxNbChars = 10, $indexSize = 2),
                'slug'=>$faker->slug()
            ]);
        }
    }
}
