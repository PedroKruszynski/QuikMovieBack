<?php

namespace App\Contracts;

interface GenreInterface
{
    public function getGenreMovieList($query);
    public function makeGenreString($movies, $genres);
}
