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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('link');
            $table->integer('order');
            $table->boolean('is_parent')->default(false);
            $table->integer('parent');
            $table->integer('level');
            $table->enum('link_target', ['none', '_blank']);
            $table->boolean('is_footer');
            $table->boolean('is_active')->default(false);
            $table->boolean('is_external_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
};
