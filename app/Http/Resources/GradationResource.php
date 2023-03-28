<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GradationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'base' => $this->base,
            'min' => $this->min,
            'max' => $this->max,
            'number' => $this->number,
            'image' => $this->image,
            'variation-cm' => $this->variationCm,
            'variation' => $this->variation,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
