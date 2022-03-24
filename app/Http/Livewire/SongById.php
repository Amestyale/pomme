<?php

namespace App\Http\Livewire;

use App\Models\Song;
use Livewire\Component;

class SongById extends Component
{
    public $song = null;

    public function render()
    {
        $music = (isset($this->song) ? Song::find($this->song) : null);
        return view('livewire.song-by-id',["music" => $music]);
    }
}
