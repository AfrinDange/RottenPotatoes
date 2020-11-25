<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/movies', [MovieController::class,'getMovieCard'])->name('movies.getMovieCard');

Route::get('/movies/{imdbID}', [MovieController::class, 'getMovieDetails'])->name('movies.getMovieDetails');

Route::get('tvseries', [SeriesController::class, 'getSeriesCard'])->name('tvseries.getSeriesCard');

Route::get('tvseries/{imdbID}', [SeriesController::class, 'getSeriesDetails'])->name('tvseries.getSeriesDetails');

Route::get('actor/{imdbID}', [ActorController::class, 'getActorData'])->name('actor.getActorData');

Route::any('addmoviereview/{imdbID}', [ReviewController::class, 'addMovieReview'])->name('addmoviereview');

Route::any('addseriesreview/{imdbID}', [ReviewController::class, 'addSeriesReview'])->name('addseriesreview');

Route::get('/search', [SearchController::class, 'search'])->name('search');