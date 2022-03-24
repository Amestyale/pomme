<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        DB::statement("CREATE VIEW collaboration AS SELECT song.id, song.name AS title, duration, url, a.name FROM song INNER JOIN artist_song AS r ON r.song_id = song.id INNER JOIN artist AS a ON r.artist_id = a.id;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_group_view');
    }
};
