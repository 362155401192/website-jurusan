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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('address');
            $table->string('image')->nullable()->default('default.png');
            // $table->boolean('is_publish')->default(false);
            // $table->timestamp('published_at')->nullable();
            // $table->unsignedBigInteger('publisher_id')->nullable();
            $table->timestamps();
            // $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            // $table->foreign('publisher_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cooperation_partners');
    }
};
