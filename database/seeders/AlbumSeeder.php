<?php

namespace Database\Seeders;

use App\Models\Album;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use File;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/albums.json");
        $albums = json_decode($json);
  
        foreach ($albums as $album) {
            Album::create([
                "id" => $album->id,
                "slug" => $album->slug,
                "name" => $album->name,
                "release" => $album->release,
                "color" => $album->color,
                "description" => $album->description,
                "shortname" => (isset($album->shortname)) ? $album->shortname : $album->name
            ]);
        }
    }
}
