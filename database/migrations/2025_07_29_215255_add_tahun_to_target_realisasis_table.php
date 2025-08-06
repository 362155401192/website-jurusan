<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('target_realisasis', function (Blueprint $table) {
            $table->year('tahun')->after('indikator_kinerja_kegiatan_id')->default(date('Y'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('target_realisasis', function (Blueprint $table) {
            $table->dropColumn('tahun');
        });
    }
};
