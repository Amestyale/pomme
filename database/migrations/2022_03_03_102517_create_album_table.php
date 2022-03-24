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
        Schema::create('album', function (Blueprint $table) {
            $table->id();
            $table->string("slug",50)->unique();
            $table->string("name");
            $table->text("description");
            $table->string("shortname")->nullable();
            $table->string("color",7);
            $table->dateTime("release");
        });

        Schema::table('song', function (Blueprint $table) {
            $table->unsignedBigInteger('album_id')->nullable(true);
            $table->foreign('album_id')->references('id')->on('album');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('album');
    }
};
