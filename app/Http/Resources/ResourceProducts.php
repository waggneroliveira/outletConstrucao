<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResourceProducts extends JsonResource
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
            'categoryTitle' => $this->categoryTitle,
            'subcategoryTitle' => $this->subcategoryTitle,
            'title' => $this->title,
            'description' => strip_tags($this->description),
            'feature' => strip_tags($this->feature),
            'stockAmount' => (float) $this->stockAmount,
            'stockPromotionValue' => (float) $this->stockPromotionValue
        ];
    }
}
