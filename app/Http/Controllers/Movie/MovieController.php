<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Movie\MovieService;

class MovieController extends Controller
{
    private $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    /**
     * Display details of a movie by id.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMovieDetails(Request $request)
    {
        return response()->json(
            $this->movieService->getMovieDetails($request->movie_id, $request->query())
        );
    }
}
