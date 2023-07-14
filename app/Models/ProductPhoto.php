<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductPhoto extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'photos',
        'product_id'
    ];

    protected $casts = [
        'photos' => 'json'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
