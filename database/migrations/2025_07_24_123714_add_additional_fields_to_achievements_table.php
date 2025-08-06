<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('achievements', function (Blueprint $table) {
            $table->string('nim')->after('title');
            $table->string('nama_mahasiswa')->after('nim');
            $table->string('penyelenggara')->after('nama_mahasiswa');
            $table->string('juara')->after('penyelenggara');
            $table->string('dosen_pembimbing')->after('juara');
            $table->string('link_sertifikat')->nullable()->after('dosen_pembimbing');
        });
    }

    public function down()
    {
        Schema::table('achievements', function (Blueprint $table) {
            $table->dropColumn([
                'nim',
                'nama_mahasiswa',
                'penyelenggara',
                'juara',
                'dosen_pembimbing',
                'link_sertifikat',
            ]);
        });
    }
};
