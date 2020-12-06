<?php

namespace App\Services\Genre;

use Illuminate\Support\Facades\Http;
use Exception;

use App\Contracts\GenreInterface;
use App\Services\Api\ApiService;

class GenreService extends ApiService implements GenreInterface
{

    public function getGenreMovieList($query)
    {
        try {

            $response = Http::get("{$this->baseUrl}/genre/movie/list",
                                    $this->handleQueryParams($query)
                                );

            return $this->handleResponse($response);

        } catch (\Throwable $exception) {
            throw new Exception(
                $exception->getMessage()
            );
        }
    }

    /**
     * Receive a array of movies and add a index call genreList
     * genreList is a string with the names of a id genre
     */
    public function makeGenreString($movies, $genres)
    {

        $ids    = array_column($genres, 'id');
        $names  = array_column($genres, 'name');

        $genres = array_combine($ids , $names);

        foreach ($movies as $key => $movie) {
            $genresArray = array_keys(array_intersect(array_flip($genres), $movie->genre_ids));
            $movies[$key]->genreList = implode(',', $genresArray);
        }

        return $movies;
    }

}
