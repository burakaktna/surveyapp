<?php

namespace App\Http\Resources;

use Crypt;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Advertisement */
class AdvertisementResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => Crypt::encryptString($this->id),
            'name' => $this->name,
            'url' => $this->url,
            'deleted_at' => $this->deleted_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
