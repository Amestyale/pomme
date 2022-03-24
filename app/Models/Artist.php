<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
    protected $table = 'artist';
    public $timestamps = false;
    protected $fillable = [
        'id', 'name'
    ];

    public function songs()
    {
        return $this->belongsToMany(Song::class, 'artist_song', 'artist_id', 'song_id');
    }
}
