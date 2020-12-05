<?php

namespace App\Services\Trending;

use Illuminate\Support\Facades\Http;

use App\Contracts\TrendingInterface;
use App\Services\Api\ApiService;

class TrendingService extends ApiService implements TrendingInterface
{

    public function getTrending($media_type, $time_window, $query)
    {
        try {

            $response = Http::get("{$this->baseUrl}/trending/{$media_type}/{$time_window}",
                                    $this->handleQueryParams($query)
                                );

            return $this->handleResponse($response);

        } catch (\Throwable $exception) {

        }
    }
}
