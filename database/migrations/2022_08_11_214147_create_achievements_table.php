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

        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('achievement_level_id');
            $table->unsignedBigInteger('achievement_type_id');
            $table->unsignedBigInteger('achievement_program_studi_id');
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('location');
            $table->date('date');
            $table->string('slug');
            $table->text('description');
            $table->string('image')->nullable()->default('default.png');
            $table->boolean('is_external_link')->default(false);
            $table->boolean('is_publish')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->unsignedBigInteger('publisher_id')->nullable();
            $table->timestamps();
            $table->foreign('achievement_level_id')->references('id')->on('achievement_levels')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('achievement_type_id')->references('id')->on('achievement_types')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('achievement_program_studi_id')->references('id')->on('achievement_program_studis')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('achievements');
    }
};
