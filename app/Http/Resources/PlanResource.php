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
            'images' => $this->images,
            'price' => $this->price,
            'type' => $this->type,
            'keywords' => $this->keywords,
            'supplies' => $this->supplies,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'level_id' => $this->level_id,
            'user_id' => $this->user_id,
            'steps_count' => $this->steps_count,
            'steps' => json_decode($this->steps),
            'user' => $this->user->name,
        ];
    }
}
