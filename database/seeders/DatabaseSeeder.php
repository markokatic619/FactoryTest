<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            LanguagesData::class,
            IngredientsData::class,
            CategoryData::class,
            MealsData::class,
            IngredientsListData::class,
            TagsData::class,
            TagsListData::class
        ]);
    }
}
