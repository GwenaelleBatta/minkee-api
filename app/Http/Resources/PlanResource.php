<?php

namespace App\Http\Resources;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
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
            'cut' => $this->cut,
            'gender' => $this->gender,
            'price' => $this->price,
            'type' => $this->type,
            'images' => json_decode($this->images),
            'keywords' => json_decode($this->keywords),
            'supplies' => json_decode($this->supplies),
            'steps_count' => $this->steps_count,
            'steps' => $this->steps,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
