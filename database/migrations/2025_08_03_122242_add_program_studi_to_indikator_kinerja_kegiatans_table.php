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
        Schema::table('indikator_kinerja_kegiatans', function (Blueprint $table) {
            $table->string('program_studi')->nullable()->after('sasaran_kinerja_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('indikator_kinerja_kegiatans', function (Blueprint $table) {
            $table->dropColumn('program_studi');
        });
    }
};
