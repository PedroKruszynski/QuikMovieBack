<?php

namespace Tests\Unit;

use Tests\TestCase;

class GetGenreMovieTest extends TestCase
{
    /**
     * Test route /api/discover/movie.
     *
     * @return void
     */
    public function testGetGenreMovie()
    {
        $response = $this->call('GET', '/api/quikmovie/genre/movie');

        $response->assertStatus(200);
    }
}
