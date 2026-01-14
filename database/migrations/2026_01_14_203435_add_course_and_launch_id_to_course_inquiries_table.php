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
        $table->foreignId('course_id')->nullable()->after('id')->constrained()->onDelete('cascade');
        $table->foreignId('launch_id')->nullable()->after('course_id')->constrained('course_launches')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('course_inquiries', function (Blueprint $table) {
        $table->dropForeign(['course_id']);
        $table->dropColumn('course_id');
        $table->dropForeign(['launch_id']);
        $table->dropColumn('launch_id');
    });
}

};
