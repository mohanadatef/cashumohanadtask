<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class configResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => new UserResource($this->user),
            'sales_target' => $this->sales_target ,
        ];
    }
}
