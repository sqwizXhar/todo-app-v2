<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'created_at' => $this->created_at ? $this->created_at->format('d.m.Y, H:i:s') : null,
            'updated_at' => $this->updated_at ? $this->updated_at->format('d.m.Y, H:i:s') : null,
        ];
    }
}
