<?php

namespace Tests\Unit;

use Tests\TestCase;

class GetSearchMovieTest extends TestCase
{
    /**
     * Test route /api/discover/movie.
     *
     * @return void
     */
    public function testGetSearchMovie()
    {

        $queryParams = [
            'query'       => 'ponte%20para%20terabitia',
            'with_genres' => '99,28,12'
        ];

        $response = $this->call('GET', '/api/quikmovie/search/movie', $queryParams);

        $response->assertStatus(200);
    }
}
