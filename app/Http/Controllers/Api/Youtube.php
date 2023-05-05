<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SearchResultResource;
use App\Services\YoutubeService;
use Illuminate\Http\Request;

class Youtube extends Controller
{

    public function index(Request $request)
    {

        $youtubeService =  new YoutubeService('356b46ad09mshcf052c401cba91fp164641jsn95fce6399bac');

        $querySearch = $request->query('query');

        $response = response()->json([]);

        if  ($querySearch) {
            $searchResult =  $youtubeService->search(  str_replace('+', ' ', $querySearch) );

            $response = SearchResultResource::make($searchResult);
        }

        return $response;
    }

}
