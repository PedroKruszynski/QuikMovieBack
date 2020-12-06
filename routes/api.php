<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('quikmovie')->middleware(['checkApi'])->group(function () {
    Route::prefix('trending')->namespace('Trending')->group(function () {
        Route::get('{media_type}/{time_window}',   'TrendingController@getTrending');
    });
    Route::prefix('genre')->namespace('Genre')->group(function () {
        Route::get('movie',   'GenreController@getGenreMovieList');
    });
    Route::prefix('movie')->namespace('Movie')->group(function () {
        Route::get('{movie_id}',   'MovieController@getMovieDetails');
    });
    Route::prefix('discover')->namespace('Discover')->group(function () {
        Route::get('movie',   'DiscoverController@getDiscoverMovie');
    });
    Route::prefix('search')->namespace('Search')->group(function () {
        Route::get('movie',   'SearchController@getSearchMovie');
    });
});

Route::fallback(function () {
    return response()->json("Hmm, sorry I don't understand that route", 404);
});

