<?php

namespace App\Http\Resources;

use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Price */
class PriceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'date'        => $this->date,
            'price'       => $this->price,
            'offer_price' => $this->offer_price,
            'card_price'  => $this->card_price,
            'created_at'  => $this->created_at,
            'updated_at'  => $this->updated_at,

            'url_id' => $this->url_id,

            'url' => new UrlResource($this->whenLoaded('url')),
        ];
    }
}
