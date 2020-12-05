<?php

namespace App\Http\Controllers\Discover;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Discover\DiscoverService;

class DiscoverController extends Controller
{

    private $discoverService;

    public function __construct(DiscoverService $discoverService)
    {
        $this->discoverService = $discoverService;
    }

    /**
     * Display a discover search.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDiscoverMovie(Request $request)
    {
        return response()->json(
            $this->discoverService->getDiscoverMovie($request->query())
        );
    }
}
