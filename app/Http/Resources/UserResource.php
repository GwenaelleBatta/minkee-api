<?php

namespace App\Http\Resources;

use App\Models\Mesure;
use App\Models\Supply;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'avatar' => $this->avatar,
            'description' => $this->description,
            'email' => $this->email,
            'supplies'=> SupplyResource::collection($this->supplies),
            'mesures'=> MesureResource::collection($this->mesures),
            'password' => $this->password,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
