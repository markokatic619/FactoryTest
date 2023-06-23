<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('categoryId')->nullable();
            $table->foreign('categoryId')->references('id')->on('category')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('meals_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('description');
            $table->string('locale');
            $table->unsignedBigInteger('mealId');
            $table->foreign('mealId')->references('id')->on('meals')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meals_translataions');
        Schema::dropIfExists('meals');
    }
};
