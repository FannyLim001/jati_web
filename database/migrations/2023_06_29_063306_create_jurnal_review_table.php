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
        Schema::create('jurnal_review', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jurnal_id');
            $table->unsignedBigInteger('user_id');
            $table->text('review_text')->nullable();
            $table->timestamps();

            $table->foreign('jurnal_id')->references('id')->on('jurnal')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurnal_review');
    }
};
