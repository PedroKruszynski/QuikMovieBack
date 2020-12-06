<?php

namespace Tests\Unit;

use Tests\TestCase;

class GetDiscoverTest extends TestCase
{
    /**
     * Test route /api/discover/movie.
     *
     * @return void
     */
    public function testGetDiscover()
    {
        $queryParams = [
            'with_genres' => '99'
        ];

        $response = $this->call('GET', '/api/quikmovie/discover/movie', $queryParams);

        $response->assertStatus(200);
    }
}
