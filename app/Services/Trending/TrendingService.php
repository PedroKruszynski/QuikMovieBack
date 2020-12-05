<?php

namespace App\Services\Trending;

use Illuminate\Support\Facades\Http;

use App\Contracts\TrendingInterface;
use App\Services\Api\ApiService;
use Exception;

class TrendingService extends ApiService implements TrendingInterface
{

    public function getTrending($media_type, $time_window)
    {
        try {

        } catch (\Throwable $exception) {

        }
    }
}
