<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class ProductResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
            'id' => $this->whenHas('id'),
            'name' => $this->whenHas('name'),
            'slug' => $this->whenHas('slug'),
            'description' => $this->whenHas('description'),
            'category_id' => $this->whenHas('category_id'),
            'price' => $this->whenHas('price'),
            'discount_price' => $this->whenHas('discount_price'),
            'category' => new CategoryResource($this->whenLoaded('category')),
            'url' => $this->whenHas('slug', fn() => route('guest.products.show', $this->resource->slug)),
        ];
    }
}
