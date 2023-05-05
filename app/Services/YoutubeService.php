<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class YoutubeService
{

    protected string $key;


    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function search(string $querySearch)
    {
        return $this->featch('/youtube-search/', ['q' => $querySearch])->object();
    }


    protected function featch(string $uri,  $query = [])
    {

        $uri = trim($uri, '/');

        $baseURL = 'https://youtube-search-results.p.rapidapi.com';

        $headers = [
            'X-RapidAPI-Key' => $this->key,
            'X-RapidAPI-Host' => 'youtube-search-results.p.rapidapi.com'
        ];

        return Http::withHeaders($headers)->get("$baseURL/$uri", $query);
    }

}
