<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;
use DB;

class SeriesController extends Controller
{
    //Fetches all Tv series list
    public function getSeriesCard() {
        $series = Series::all('title', 'imdbID', 'poster')
                                ->sortBy('title');
        foreach ($series as $show) {
            //encoded to dataURL format to add to the html tag
            $dataURI = (string) base64_encode($show->poster);
            $show->poster = $dataURI;
        }
        return view('serieslist', ['series' => $series]); 
    }

    //fetches TV series details along with cast
    public function getSeriesDetails($imdbID) {
        $series = DB::select('SELECT * 
                                FROM tvseries 
                                WHERE imdbID = ?', [$imdbID]);

        $cast = DB::select('SELECT imdbID, role, name, headshot
                            FROM tvseriescast
                                INNER JOIN actor ON tvseriescast.castimdbID = actor.imdbID
                                WHERE tvseriesimdbID = ?
                                ORDER BY name ASC', [$imdbID]);
        $dataURI = (string) base64_encode($series[0]->poster);
        $series[0]->poster = $dataURI;
        foreach ($cast as $role) {
            $dataURI = (string) base64_encode($role->headshot);
            $role->headshot = $dataURI;
        }

        //get reviews
        $reviews = DB::select('SELECT username, avatar, title, content, rating, userID, tvseriesimdbID
                                FROM tvseriesreview, userdetails 
                                WHERE userdetails.id = tvseriesreview.userID AND tvseriesimdbID = ?', [$imdbID]);
        return view('series')
                        ->with('series', $series)
                        ->with('cast', $cast)
                        ->with('reviews', $reviews);
    }
}
