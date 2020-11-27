<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use DB;


class UserController extends Controller
{
    //displays user details and reviews for other users to see
    public function getUserDetails($username)
    {
        $userID = DB::select('SELECT id
                                FROM userdetails
                                WHERE username = ?', [$username]); 
        $userID = (string) $userID[0]->id;
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
        return view('userprofile')
                    ->with('userdetails', $userdetails)
                    ->with('moviesReview', $moviesReview)
                    ->with('tvseriesReview', $tvseriesReview);
    }

    //user can delete their movie review
    public function deleteMovieReview(Request $request) {
        $userID = $request->userID;
        $movieimdbID = $request->movieimdbID;
        DB::delete('DELETE FROM moviesreview 
                    WHERE userid = ? AND movieimdbid = ?', [$userID, $movieimdbID]);
        return redirect()->back();
    }

    //user can delete their tvseries review
    public function deleteTvseriesReview(Request $request) {
        $userID = $request->userID;
        $tvseriesimdbID = $request->tvseriesimdbID;
        DB::delete('DELETE FROM tvseriesreview 
                    WHERE userid = ? AND tvseriesimdbid = ?', [$userID, $tvseriesimdbID]);
        return redirect()->back();
    }
}
