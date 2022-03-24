<?php

namespace Database\Seeders;

use App\Models\Song;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use File;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/songs.json");
        $songs = json_decode($json);
        var_dump($songs);
  
        foreach ($songs as $song) {
            Song::create([
                "id" => $song->id,
                "album_id" => $song->album,
                "slug" => $song->slug,
                "name" => $song->name,
                "duration" => $song->duration,
                "url" => $song->url,
                "lyrics" => $song->lyrics,
                "participation" => (isset($song->participation) ? true : false),
                "collaboration" => (isset($song->collaboration) ? true : false)
            ]);
        }
    }
}
