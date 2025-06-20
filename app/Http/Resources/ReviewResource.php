<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
     public function toArray($request)
    {
        return [
            'id'      => $this->id,
            'rating'  => $this->rating,
            'comment' => $this->comment,
            'book'    => new BookResource($this->book),
            'usuary'    => $this->user->name ?? null, // ou UserResource se quiser
        ];
    }
}
