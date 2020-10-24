<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ActorController extends Controller
{
    //Fetcher actor data
    function getActorData($imdbID) {
        $actor = DB::select('SELECT * FROM ACTOR WHERE imdbID = ?', [$imdbID]);
        //encodes the blob of headshot to dataURI format
        $dataURI = (string) base64_encode($actor[0]->headshot);
        $actor[0]->headshot = $dataURI;

        //formatting lists
        $toremove = ["[", "]", "\\"];
        $replacewith = ["", "", ""];
        $actor[0]->trademark = str_replace($toremove, $replacewith, $actor[0]->trademark);
        $actor[0]->bio = str_replace($toremove, $replacewith, $actor[0]->bio);
        //$actor[0]->bio = substr($actor[0]->bio, 1, -1);
        //$actor[0]->quotes = substr($actor[0]->quotes, 1, -1);
        //trim($actor[0]->quotes, "\\");

        $toremove =    ["',", ", '", "['", '["', '"]', "']", "\\"];
        $replacewith = ['",', ', "',  '"',  '"',  '"',  '"',   ""];
        $actor[0]->quotes = str_replace($toremove, $replacewith, $actor[0]->quotes);
        
        //convert list
        $actor[0]->quotes = explode("\",", $actor[0]->quotes);
        $actor[0]->bio = explode("::", $actor[0]->bio);

        //formatting quotes
        //return $actor[0]->quotes;
        return view('actor')
                        ->with('actor', $actor);
    }
}
