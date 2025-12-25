<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->string('level')->nullable()->after('title');
            $table->string('duration')->nullable()->after('level');
            $table->decimal('price', 10, 2)->nullable()->after('duration');
            $table->text('skills')->nullable()->after('price'); // prerequisites
            

            // if you don't already have image column:
            // $table->string('image')->nullable()->after('title');
        });
    }

    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn(['level','duration','price','skills']);
        });
    }
};
