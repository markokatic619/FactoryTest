<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TagsListData extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 1; $i<=7; $i++ )
        {
            do {
                try{
                    $isSuccess = DB::table('tags_list')->insert([
                        'mealId'=>$i,
                        'tagId'=>$faker->numberBetween($min = 1, $max = 15)
                    ]);
                }catch(QueryException $e){ 
                    // Do nothing
                } 
                
            }while(!$isSuccess);
        }
        for($i = 0; $i<8; $i++ )
        {
            do {
                try{
                    $isSuccess = DB::table('tags_list')->insert([
                        'mealId'=>$faker->numberBetween($min = 1, $max = 7),
                        'tagId'=>$faker->numberBetween($min = 1, $max = 15)
                    ]);
                }catch(QueryException $e){ 
                    // Do nothing
                } 
                
            }while(!$isSuccess);
        }
    }
}
