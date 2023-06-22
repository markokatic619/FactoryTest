<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LanguagesData extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 0; $i<5; $i++ )
        {
            DB::table('languages')->insert([
                'language'=>$faker->languageCode()
            ]);
        }
    }
}
