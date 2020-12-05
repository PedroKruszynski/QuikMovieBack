<?php

namespace App\Http\Controllers\Genre;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Genre\GenreService;

class GenreController extends Controller
{

    private $genreService;

    public function __construct(GenreService $genreService)
    {
        $this->genreService = $genreService;
    }

    /**
     * Display all genres of movie.
     *
     * @return \Illuminate\Http\Response
     */
    public function getGenreMovieList(Request $request)
    {
        return response()->json(
            $this->genreService->getGenreMovieList($request->query())
        );
    }
}
