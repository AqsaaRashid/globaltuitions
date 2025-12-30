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
    Schema::table('course_inquiries', function (Blueprint $table) {
        $table->boolean('is_viewed')->default(false);
        $table->enum('reply_status', ['pending', 'replied'])->default('pending');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('course_inquiries', function (Blueprint $table) {
            //
        });
    }
};
