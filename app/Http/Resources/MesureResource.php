<?php

namespace App\Http\Resources;

use App\Models\TypeSupply;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MesureResource extends JsonResource
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
            'gender' => $this->gender,
            'outline' => json_decode($this->outline),
            'lenght' => json_decode($this->lenght),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
