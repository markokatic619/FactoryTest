<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ingredients_list', function (Blueprint $table) {
            $table->unsignedBigInteger('mealId');
            $table->unsignedBigInteger('ingredientId');
            $table->foreign('ingredientId')->references('id')->on('ingredients');
            $table->foreign('mealId')->references('id')->on('meals');
            $table->primary(['mealId','ingredientId']);
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('ingredients_list');
    }
};
