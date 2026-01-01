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
       // database/migrations/xxxx_create_course_launches_table.php

Schema::create('course_launches', function (Blueprint $table) {
    $table->id();
    $table->foreignId('course_id')
          ->constrained('courses')
          ->cascadeOnDelete();
    $table->date('launch_date');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_launches');
    }
};
