<?php

namespace App\Contracts;

interface TrendingInterface
{
    public function getTrending($media_type, $time_window);
}
