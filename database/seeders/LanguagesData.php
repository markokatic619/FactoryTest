<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguagesData extends Seeder
{
    public function run(): void
    {
        $locales = config('app.locales');
        foreach ($locales as $locale) {
            DB::table('languages')->insert([
                'language'=>$locale
            ]);
        }
    }
}
