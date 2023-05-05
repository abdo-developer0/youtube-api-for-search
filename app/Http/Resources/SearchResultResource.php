<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SearchResultResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'ok' => $this->status,
            'auery' =>  $this->originalQuery,
            'total' => count($this->items),
            'results' => $this->items
        ];
    }
}
