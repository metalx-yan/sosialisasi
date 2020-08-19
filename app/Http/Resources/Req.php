<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Req extends JsonResource
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
            'id' => $this->id,
            'item_id' => $this->item->name,
            'total_masuk' => $this->total_masuk,
            'item' => $this->item->stock,
            'updated_at' => $this->updated_at
        ];
    }
}
