<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;

class ReviewController extends Controller
{
    //For saving movie reviews
    public function addMovieReview(Request $request, $imdbID) {
        $review = array(
            'title' => $request->title,
            'content' => $request->content,
            'rating' => $request->rating,
            'userID' => Auth::id(),
            'movieimdbID' => $imdbID,
            
        );
        // add review to database
        try {
            DB::table('moviesreview')->insert($review);
        } catch(QueryException $ex) {
            $response = "You have already reviewed this movie!";
            return redirect()->back();    
        }
        return redirect()->back();
    }

    //for saving tvseries reviews
    public function addSeriesReview(Request $request, $imdbID) {
        $review = array(
            'title' => $request->title,
            'content' => $request->content,
            'rating' => $request->rating,
            'userID' => Auth::id(),
            'tvseriesimdbID' => $imdbID,
            
        );
        // add review to database
        try {
            DB::table('tvseriesreview')->insert($review);
        } catch(QueryException $ex) {
            $response = "You have already reviewed this movie!";
            return redirect()->back();    
        }
        return redirect()->back();
    }
}
