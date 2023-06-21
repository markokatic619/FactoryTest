<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mealId');
            $table->string('title');
            $table->string('slug');
            $table->foreign('mealId')->references('id')->on('meals');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
