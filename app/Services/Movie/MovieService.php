<?php

namespace App\Services\Movie;

use Illuminate\Support\Facades\Http;
use Exception;

use App\Contracts\MovieInterface;
use App\Services\Api\ApiService;

class MovieService extends ApiService implements MovieInterface
{

    public function getMovieDetails($movie_id, $query)
    {
        try {

            $response = Http::get("{$this->baseUrl}/movie/{$movie_id}",
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
