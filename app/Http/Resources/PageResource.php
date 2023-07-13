<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class PageResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
            'id' => $this->whenHas('id'),
            'name' => $this->whenHas('name'),
            'slug' => $this->whenHas('slug'),
            'body' => $this->whenHas('body'),
            'url' => $this->whenHas('slug', fn() => route('guest.pages.show', $this->resource->slug))
        ];
    }
}
