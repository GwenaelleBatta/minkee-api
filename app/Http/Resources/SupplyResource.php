<?php

namespace App\Http\Resources;

use App\Models\TypeSupply;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SupplyResource extends JsonResource
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
            'color' => $this->color,
            'quantity' => $this->quantity,
            'number' => $this->number,
            'tint' => $this->tint,
            'pictures' => $this->pictures,
            'width' => $this->width,
            'category' => $this->category,
            //'typesupply_id' => $this->typesupply_id,
            'typesupply_id' => TypeSupply::where('typesupply_id', $this->typesupply_id)->get(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
