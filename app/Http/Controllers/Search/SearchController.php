<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Search\SearchService;
use App\Services\Genre\GenreService;
use App\Services\Movie\MovieService;

class SearchController extends Controller
{

    private $searchService;
    private $genreService;
    private $movieService;

    public function __construct(
                                SearchService $searchService,
                                GenreService $genreService,
                                MovieService $movieService
                            )
    {
        $this->searchService = $searchService;
        $this->genreService  = $genreService;
        $this->movieService  = $movieService;
    }

    /**
     * Search on the api for a movies.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSearchMovie(Request $request)
    {

        try {

            $movies = $this->searchService->getSearchMovie($request->query());
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
