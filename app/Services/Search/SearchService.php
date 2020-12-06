<?php

namespace App\Services\Search;

use Illuminate\Support\Facades\Http;
use Exception;

use App\Contracts\SearchInterface;
use App\Services\Api\ApiService;

class SearchService extends ApiService implements SearchInterface
{

    public function getSearchMovie($query)
    {
        try {

            $response = Http::get("{$this->baseUrl}/search/movie",
                                    $this->handleQueryParams($query)
                                );

            $movies = $this->handleResponse($response);

            if (isset($query['with_genres']))
                $movies = $this->filterMoviesByGeners($movies, $query['with_genres']);

            return $movies;

        } catch (\Throwable $exception) {
            throw new Exception(
                $exception->getMessage()
            );
        }
    }

    private function filterMoviesByGeners($movies, $geners)
    {

        try {

            $geners         = explode(',', $geners);
            $resultMovies   = $movies->results;
            $filteredMovies = [];

            // For each movie
            // Count how many genders have
            // array_diff to catch the difference in arrays (movie genres, queryParams genres)
            // Count how many genders are left in the difference and check with the movie count of genders
            // If the quantity is different it means that one of the genres was equal
            foreach($resultMovies as $movie) {
                if (count($movie->genre_ids) !== count(array_diff($movie->genre_ids, $geners)))
                    $filteredMovies[] = $movie;
            }

            $movies->results = $filteredMovies;

            return $movies;

        } catch (\Throwable $exception) {
            throw new Exception(
                $exception->getMessage()
            );
        }


    }
}
