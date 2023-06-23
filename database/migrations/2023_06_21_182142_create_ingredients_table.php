<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->unique();
        });
        Schema::create('ingredients_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ingredientId');
            $table->string('title');
            $table->string('locale');
            $table->foreign('ingredientId')->references('id')->on('ingredients')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('ingredients_translations');
        Schema::dropIfExists('ingredients');
    }
};
