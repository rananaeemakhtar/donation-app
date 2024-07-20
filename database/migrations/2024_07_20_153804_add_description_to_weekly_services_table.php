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
        Schema::table('weekly_services', function (Blueprint $table) {
            $table->text('description')->nullable()->after('image');

            // drop unnacessary fields
            $table->dropColumn('day');
            $table->dropColumn('start_time');
            $table->dropColumn('end_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('weekly_services', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->enum('day', ['monday', 'tuesday', 'wednesday', 'thursday', 'friday','saturday','sunday']);
            $table->time('start_time');
            $table->time('end_time');
        });
    }
};
