<?php

namespace App\Http\Controllers\Trending;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Trending\TrendingService;
use App\Services\Genre\GenreService;

class TrendingController extends Controller
{

    private $tredingService;
    private $genreService;

    public function __construct(
                                TrendingService $tredingService,
                                GenreService $genreService
                                )
    {
        $this->tredingService = $tredingService;
        $this->genreService   = $genreService;
    }

    /**
     * Display a listing of trending.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTrending(Request $request)
    {

        $movies = $this->tredingService->getTrending($request->media_type, $request->time_window, $request->query());
        $genres = $this->genreService->getGenreMovieList($request->query());

        $movies->results = $this->genreService->makeGenreString($movies->results, $genres->genres);

        return response()->json(
            $movies
        );

    }

}
