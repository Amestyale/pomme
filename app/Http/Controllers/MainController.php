<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{ 
    //musicbrainz.org / wikidata
    public function index(){
        setlocale(LC_ALL, 'fr_FR.utf8');

        $lyrics = Song::fulltext();
	    $search  = array("-","'", 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ');
	    $replace = array(" ","e ",'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y');
	    $lyrics = str_replace($search, $replace, $lyrics);
        $lyrics = preg_replace("/[\n\r]/", " ", $lyrics);
        $arr = array_count_values(str_word_count($lyrics,1));
        arsort($arr);
        $new_arr = array_filter($arr, function ($var){
            return strlen($var) > 3 ;
        },ARRAY_FILTER_USE_KEY);
        
        $new_arr = array_slice($new_arr,0,6);
        uksort($new_arr, function() { return rand() > rand(); });
        
        $text = Song::random(280);
        $text = $text." ".$text;

        $collabs = DB::select("SELECT *, name as title FROM song WHERE collaboration = 1 LIMIT 3");
        $parts = DB::select("SELECT *, name as title FROM song WHERE participation = 1 LIMIT 3");
        return view("pages.homepage", ["albums"=> Album::all(), "words" => $new_arr, "collaborations" => $collabs, "participations" => $parts]);
    }
}
