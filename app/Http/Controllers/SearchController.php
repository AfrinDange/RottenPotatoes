<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    // Query Search results
    public function search() {
        //form makes a GET request
        $search_text=$_GET['query'];
        if(isset($search_text)) {
            $movies = DB::table('movies')
                    ->select('title', 'poster', 'imdbID')
                    ->where('title','LIKE','%'.$search_text.'%')
                    ->orderBy('title', 'asc')
                    ->get();

            $actors = DB::table('actor')
                    ->select('name', 'headshot', 'imdbID')
                    ->where('name','LIKE','%'.$search_text.'%')
                    ->orderBy('name', 'asc')
                    ->get();
                    
            $tvseries = DB::table('tvseries')
                    ->select('title', 'poster','imdbID')
                    ->where('title','LIKE','%'.$search_text.'%')
                    ->orderBy('title', 'asc')
                    ->get();
                    //->unionAll($movies)
                    //->unionAll($actors);

            $resultFound = false;
            $count = $movies->count() + $actors->count() + $tvseries->count();
            if( $count > 0 ) {
                $resultFound = true;
                foreach ($movies as $movie) {
                    //encoded to dataURL format to add to the html tag
                    $dataURI = (string) base64_encode($movie->poster);
                    $movie->poster = $dataURI;
                }
                foreach ($tvseries as $show) {
                    //encoded to dataURL format to add to the html tag
                    $dataURI = (string) base64_encode($show->poster);
                    $show->poster = $dataURI;
                }
                foreach ($actors as $actor) {
                    //encoded to dataURL format to add to the html tag
                    $dataURI = (string) base64_encode($actor->headshot);
                    $actor->headshot = $dataURI;
                }
            } 
            return view('searchresults')
                            ->with('movies', $movies)
                            ->with('tvseries', $tvseries)
                            ->with('actors', $actors)
                            ->with('count', $count)
                            ->with('resultFound', $resultFound);
        }
    }
}
