<?php

namespace App\Services\Discover;

use Illuminate\Support\Facades\Http;
use Exception;

use App\Contracts\DiscoverInterface;
use App\Services\Api\ApiService;

class DiscoverService extends ApiService implements DiscoverInterface
{

    public function getDiscoverMovie($query)
    {
        try {

            $response = Http::get("{$this->baseUrl}/discover/movie",
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
