<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userID = Auth::id();
        $userdetails = DB::select('SELECT name, avatar, username, email
                                    FROM userdetails
                                    WHERE id = ?', [$userID]);

        $moviesReview = DB::select('SELECT moviesreview.title as reviewTitle, content, rating, movieimdbID, movies.title as movieTitle, poster
                                    FROM moviesreview, movies
                                    WHERE movieimdbID = imdbID AND userID = ?', [$userID]);

        $tvseriesReview = DB::select('SELECT tvseriesreview.title as reviewTitle, content, rating, tvseriesimdbID, tvseries.title as showTitle, poster
                                    FROM tvseriesreview, tvseries
                                    WHERE tvseriesimdbID = imdbID AND userID = ?', [$userID]);
        foreach ($moviesReview as $review) {
            //encoded to dataURL format to add to the html tag
            $dataURI = (string) base64_encode($review->poster);
            $review->poster = $dataURI;
        }
        foreach ($tvseriesReview as $review) {
            //encoded to dataURL format to add to the html tag
            $dataURI = (string) base64_encode($review->poster);
            $review->poster = $dataURI;
        }
        return view('home')
                    ->with('userdetails', $userdetails)
                    ->with('moviesReview', $moviesReview)
                    ->with('tvseriesReview', $tvseriesReview);
    }
}
