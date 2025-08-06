<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('indikator_kinerja_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sasaran_kinerja_id')->constrained('sasaran_kinerjas')->onDelete('cascade');
            $table->string('kode'); // contoh: IKU 1.1, IKU 1.2
            $table->text('deskripsi');
            $table->float('target_akhir')->default(0);
            $table->float('realisasi_akhir')->default(0);
            $table->timestamps();

            $table->unique(['sasaran_kinerja_id', 'kode']); // Tidak boleh ada kode sama di sasaran yang sama
        });
    }

    public function down()
    {
        Schema::dropIfExists('indikator_kinerja_kegiatans');
    }
};
