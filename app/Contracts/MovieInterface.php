<?php

namespace App\Contracts;

interface MovieInterface
{
    public function getMovieDetails($movie_id, $query);
}
