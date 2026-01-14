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
    Schema::table('course_enrollments', function (Blueprint $table) {

        $table->foreignId('launch_id')
              ->nullable()
              ->after('course_id')
              ->constrained('course_launches')
              ->cascadeOnDelete();
    });
}

public function down()
{
    Schema::table('course_enrollments', function (Blueprint $table) {

        $table->dropForeign(['launch_id']);
        $table->dropColumn('launch_id');
    });
}

};
