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
}
