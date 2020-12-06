<?php

namespace Tests\Unit;

use Tests\TestCase;

class GetTrendingTest extends TestCase
{
    /**
     * Test route /api/discover/movie.
     *
     * @return void
     */
    public function testGetTrending()
    {

        $queryParams = [
            'page' => '2',
        ];

        $response = $this->call('GET', '/api/quikmovie/trending/all/day', $queryParams);

        $response->assertStatus(200);
    }
}
