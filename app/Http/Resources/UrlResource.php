<?php

namespace App\Http\Resources;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Url */
class UrlResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'url'        => $this->url,
            'ignorable'  => $this->ignorable,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'store_id' => $this->store_id,

            'store' => new StoreResource($this->whenLoaded('store')),
        ];
    }
}
