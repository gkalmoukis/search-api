<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ListingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "location" => $this->whenLoaded('location'),
            "types" => $this->whenLoaded('types'),
            "price" => $this->price,
            "square_meters" => $this->square_meters,
            "availability" => $this->availability,
        ];
    }
}
