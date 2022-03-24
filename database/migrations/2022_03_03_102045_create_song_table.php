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
        Schema::create('song', function (Blueprint $table) {
            $table->id();
            $table->string("slug",50)->unique();
            $table->string("name",75);
            $table->integer("duration");
            $table->text("lyrics")->nullable(true);
            $table->string("url",255);
            $table->boolean("collaboration");
            $table->boolean("participation");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('song');
    }
};
