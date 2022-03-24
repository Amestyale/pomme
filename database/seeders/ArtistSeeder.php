<?php

namespace Database\Seeders;

use App\Models\Artist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use File;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/artists.json");
        $artists = json_decode($json);
  
        foreach ($artists as $a) {
            $artist = Artist::create([
                "id" => $a->id,
                "name" => $a->name
            ]);
            $artist->songs()->attach(
                $a->songs
            ); 
        }
    }
}
