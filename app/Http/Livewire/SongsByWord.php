<?php

namespace App\Http\Livewire;

use App\Models\Song;
use Livewire\Component;

class SongsByWord extends Component
{
    public $word = '';

    public function render()
    {
        $songs = Song::query()
        ->where('lyrics', 'LIKE', "%{$this->word}%") 
        ->limit(6)
        ->get();
 
        return view('livewire.songs-by-word',[
            'songs' => $songs,
        ]);
    }
}
