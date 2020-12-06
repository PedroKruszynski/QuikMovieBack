<?php

namespace Tests\Unit;

use Tests\TestCase;

class GetMovieDetailsTest extends TestCase
{
    /**
     * Test route /api/discover/movie.
     *
     * @return void
     */
    public function testGetMovieDetails()
    {
        $response = $this->call('GET', '/api/quikmovie/movie/121');

        $response->assertStatus(200);
    }
}
