<?php

namespace App\Services\Api;

class ApiService
{

    protected $baseUrl;
    protected $apiKey;
    protected $language;

    protected $page    = 1;
    protected $sort_by = 'popularity.asc';

    public function __construct()
    {
        $this->baseUrl  = config('api.baseUrl');
        $this->apiKey   = config('api.apiKey');
        $this->language = config('api.language');
    }

    public function handleQueryParams($params)
    {
        return [
            'api_key'     => $this->apiKey,
            'language'    => $params['language'] ?? $this->language,
            'page'        => $params['page'] ?? $this->page,
            'sort_by'     => $params['sort_by'] ?? $this->sort_by,
            'with_genres' => $params['with_genres'] ?? null,
            'query'       => $params['query'] ?? null
        ];
    }

    /**
    *
    * verify the request has a error
    * https://laravel.com/docs/8.x/http-client
    *
    */
    public function handleResponse($response)
    {

        if ($response->successful())
            $response = json_decode($response->body());
        else if ($response->serverError())
            return $response->throw();

        return $response;
    }

}
