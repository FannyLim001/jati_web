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
        Schema::create('user_profile', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_telp');
            $table->string('afiliasi');
            $table->string('bahasa_kerja');
            $table->string('gsch_id')->unique();
            $table->string('scopus_id')->unique();
            $table->string('sinta_id')->unique();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_profile');
    }
};
