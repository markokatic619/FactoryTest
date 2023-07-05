<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tags_list', function (Blueprint $table) {
            $table->unsignedBigInteger('mealId');
            $table->unsignedBigInteger('tagId');
            $table->foreign('tagId')->references('id')->on('tags');
            $table->foreign('mealId')->references('id')->on('meals');
            $table->primary(['mealId','tagId']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tags_list');
    }
};
