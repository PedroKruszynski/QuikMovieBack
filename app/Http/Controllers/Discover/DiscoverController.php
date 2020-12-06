<?php

namespace App\Http\Controllers\Discover;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Discover\DiscoverService;
use App\Services\Genre\GenreService;
use App\Services\Movie\MovieService;

class DiscoverController extends Controller
{

    private $discoverService;
    private $genreService;
    private $movieService;

    public function __construct(
                                DiscoverService $discoverService,
                                GenreService $genreService,
                                MovieService $movieService
                                )
    {
        $this->discoverService = $discoverService;
        $this->genreService  = $genreService;
        $this->movieService  = $movieService;
    }

    /**
     * Display a discover search.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDiscoverMovie(Request $request)
    {

        try {

            $movies = $this->discoverService->getDiscoverMovie($request->query());
            $genres = $this->genreService->getGenreMovieList($request->query());

            $movies->results = $this->genreService->makeGenreString($movies->results, $genres->genres);
            $movies->results = (array) $this->movieService->orderMoviesByName($movies->results);

            return response()->json(
                $movies
            );

        } catch (\Throwable $exception) {
            return response()->json(
                $movies,
                500
            );
        }

    }
}
