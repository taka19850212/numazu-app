<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image_path',
        'category_id',
        'map_url',
        'is_halal_friendly',
        'is_private_booking',
        'is_english_friendly'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
