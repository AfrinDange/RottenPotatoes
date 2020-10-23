<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;

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

// Route::get('/movies', function () {
//     return view('movielist');
// });

Route::get('/movies', [MovieController::class,'getMovieCard'])->name('movies.getMovieCard');

Route::get('/movies/{imdbID}', [MovieController::class, 'getMovieDetails'])->name('movies.getMovieDetails');



