<?php

namespace App\Http\Controllers\Trending;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Trending\TrendingService;

class TrendingController extends Controller
{

    private $tredingService;

    public function __construct(TrendingService $tredingService)
    {
        $this->tredingService = $tredingService;
    }

    /**
     * Display a listing of trending.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTrending(Request $request)
    {
        return response()->json(
            $this->tredingService->getTrending($request->media_type, $request->time_window, $request->query())
        );
    }

}
