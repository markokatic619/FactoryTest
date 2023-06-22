<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\QueryException;

class IngredientsListData extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 0; $i<15; $i++ )
        {
            do {
                try{
                    $isSuccess = DB::table('ingredients_list')->insert([
                        'mealId'=>$faker->numberBetween($min = 1, $max = 7),
                        'ingredientId'=>$faker->numberBetween($min = 1, $max = 10)
                    ]);
                }catch(QueryException $e){ 
                    // Do nothing
                } 
                
            }while(!$isSuccess);
        }
    }
}
