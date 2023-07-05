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
            $table->string('slug');
        });
        Schema::create('tags_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tagId');
            $table->string('title');
            $table->string('locale');
            $table->foreign('tagId')->references('id')->on('tags')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('tags_translations');
        Schema::dropIfExists('tags');
    }
};
