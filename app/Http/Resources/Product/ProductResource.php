<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'products',
            'id' => $this->resource->getRouteKey(),
            'attributes' => [
                'name' => $this->resource->name,
                'description' => $this->resource->description,
                'stock' => $this->resource->stock,
                'price' => $this->resource->price,
                'active' => $this->resource->active,
                'images' => $this->resource->images
            ]
        ];
    }
}