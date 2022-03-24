<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Song extends Model
{
    use HasFactory;
    protected $table = 'song';
    public $timestamps = false;
    
    protected $fillable = [
        'id', 'slug', "name", "release", "duration", "lyrics", "url", "album_id"
    ];

    static function fulltext(){
        $text = DB::select("SELECT GROUP_CONCAT(lyrics) AS lyrics FROM song")[0]->lyrics;
        return $text;
    }

    static function random($size){
        $result = DB::select("SELECT SUBSTRING(lyrics FROM FLOOR(RAND()*(LENGTH(lyrics)-$size)) FOR $size) AS lyrics FROM `song` ORDER BY RAND() LIMIT 1");
        return $result[0]->lyrics;

    }
}
