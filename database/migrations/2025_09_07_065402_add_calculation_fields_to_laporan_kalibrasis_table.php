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
        Schema::table('laporan_kalibrasis', function (Blueprint $table) {
            $table->double('nilai_setting')->nullable();
            $table->json('nilai_pengukuran')->nullable();
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('laporan_kalibrasis', function (Blueprint $table) {
            //
        });
    }
};
