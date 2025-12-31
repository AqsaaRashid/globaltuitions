<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   
        public function up()
{
    Schema::table('courses', function (Blueprint $table) {
        $table->foreignId('training_category_id')
              ->nullable() // 👈 THIS FIXES THE ERROR
              ->constrained('training_categories')
              ->nullOnDelete();
    });
}

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            //
        });
    }
};
