<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_type_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('employee_status_id')->nullable();
            $table->unsignedBigInteger('employee_program_studi_id')->nullable();
            $table->uuid('id_sdm')->nullable(); // Ubah kolom id_sdm agar nullable
            $table->string('identity_number');
            $table->string('slug');
            $table->string('name');
            $table->string('nidn');
            $table->string('position');
            $table->string('email');
            $table->string('phone_number');
            $table->string('address');
            $table->enum('gender', ['male', 'female']);
            $table->string('image')->nullable()->default('default.png');
            $table->timestamps();
            $table->foreign('employee_type_id')->references('id')->on('employee_types')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('employee_status_id')->references('id')->on('employee_statuses')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('employee_program_studi_id')->references('id')->on('employee_program_studis')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
