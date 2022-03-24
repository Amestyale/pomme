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
        
        Schema::create('artist_song', function (Blueprint $table) {
            $table->bigInteger('artist_id')->unsigned()->index();
            $table->foreign('artist_id')->references('id')->on('artist')->onDelete('cascade');

            $table->bigInteger('song_id')->unsigned()->index();
            $table->foreign('song_id')->references('id')->on('song')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pivot_artist_song');
    }
};
