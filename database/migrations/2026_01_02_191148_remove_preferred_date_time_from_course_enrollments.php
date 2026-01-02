<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('course_enrollments', function (Blueprint $table) {
            $table->dropColumn(['preferred_date', 'preferred_time']);
        });
    }

    public function down()
    {
        Schema::table('course_enrollments', function (Blueprint $table) {
            $table->date('preferred_date');
            $table->time('preferred_time');
        });
    }
};
