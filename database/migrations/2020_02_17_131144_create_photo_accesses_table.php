<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotoAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_accesses', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('photo_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');
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
        Schema::dropIfExists('photo_accesses');
    }
}
