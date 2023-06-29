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
        Schema::table('jurnal', function (Blueprint $table) {
            $table->unsignedBigInteger('volume_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('status_id')
              ->references('id')
              ->on('status')
              ->onDelete('cascade');
              
            $table->foreign('volume_id')
              ->references('id')
              ->on('jurnal_volume')
              ->onDelete('cascade');

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
        //
    }
};
