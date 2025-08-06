<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sasaran_kinerjas', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique(); // Tidak boleh duplikat
            $table->string('nama');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sasaran_kinerjas');
    }
};
