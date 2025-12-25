<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('training_images', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('training_category_id');
    $table->string('image'); // image path
    $table->timestamps();

    $table->foreign('training_category_id')
          ->references('id')
          ->on('training_categories')
          ->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_images');
    }
};
