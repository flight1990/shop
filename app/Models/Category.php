<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, HasSlug, NodeTrait;

    protected $fillable = [
        'name',
        'slug',
        '_lft',
        '_rgt',
        'parent_id'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
