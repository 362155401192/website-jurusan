<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('target_realisasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('indikator_kinerja_kegiatan_id')->constrained('indikator_kinerja_kegiatans')->onDelete('cascade');
            $table->enum('triwulan', ['1', '2', '3']);
            $table->float('target')->default(0);
            $table->float('realisasi')->default(0);
            $table->string('file_pendukung')->nullable();
            $table->timestamps();

            $table->unique(['indikator_kinerja_kegiatan_id', 'triwulan']); // Tidak boleh ada data triwulan ganda untuk indikator yang sama
        });
    }

    public function down()
    {
        Schema::dropIfExists('target_realisasis');
    }
};
