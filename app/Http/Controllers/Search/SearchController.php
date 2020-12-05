<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Search\SearchService;

class SearchController extends Controller
{

    private $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    /**
     * Search on the api for a movies.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSearchMovie(Request $request)
    {
        return response()->json(
            $this->searchService->getSearchMovie($request->query())
        );
    }
}
