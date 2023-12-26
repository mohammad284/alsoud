<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'notification' => $this->notification,
            // 'payload' => $this->notification['payload'],
        ];
    }
}