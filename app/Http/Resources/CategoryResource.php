<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class CategoryResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
            'id' => $this->whenHas('id'),
            'name' => $this->whenHas('name'),
            'slug' => $this->whenHas('slug'),
            'parent_id' => $this->whenHas('parent_id'),
            'children' => CategoryResource::collection($this->whenLoaded('categories')),
            'parent' => new CategoryResource($this->whenLoaded('parent')),
            'url' => $this->whenHas('slug', fn() => route('guest.categories.show', $this->resource->slug)),
        ];
    }
}
