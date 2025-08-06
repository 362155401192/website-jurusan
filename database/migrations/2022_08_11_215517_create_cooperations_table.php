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
        Schema::create('cooperations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('partner_id');
            $table->unsignedBigInteger('cooperation_field_id');
            $table->unsignedBigInteger('cooperation_type_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('benefit');
            $table->date('date_start');
            $table->date('date_end');
            $table->string('link')->nullable();
            $table->boolean('is_external_link')->default(false);
            $table->boolean('is_publish')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->unsignedBigInteger('publisher_id')->nullable();
            $table->timestamps();
            $table->foreign('partner_id')->references('id')->on('partners')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('cooperation_field_id')->references('id')->on('cooperation_fields')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('cooperation_type_id')->references('id')->on('cooperation_types')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('publisher_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cooperations');
    }
};
