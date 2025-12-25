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
    Schema::create('course_enrollments', function (Blueprint $table) {
        $table->id();
        $table->string('course_name');
        $table->string('name');
        $table->string('email');
        $table->string('phone');
        $table->date('preferred_date');
        $table->time('preferred_time');
        $table->text('message')->nullable();
        $table->timestamps();
    });
}
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_enrollments');
    }
};
