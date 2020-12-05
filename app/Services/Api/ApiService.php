<?php

namespace App\Services\Api;

class ApiService
{
    protected $baseUrl;
    protected $apiKey;
    protected $language;

    public function __construct(){
        $this->baseUrl  = config('api.baseUrl');
        $this->apiKey   = config('api.apiKey');
        $this->language = config('api.language');
    }

}
