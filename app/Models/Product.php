<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'name', 'slug',
        'price', 'price_discount',
        'description', 'size', 'facts', 'howtouse', 'ingredients',
        'img', 'type', 'bundle'
    ];

    protected $casts = [
        'facts' => 'array',
        'size' => 'array',
        'howtouse' => 'array'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
