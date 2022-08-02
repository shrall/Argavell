<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;

    protected $fillable = [
        'name', 'slug', 'sku',
        'price', 'price_discount', 'stock',
        'description', 'size', 'facts', 'howtouse', 'ingredients',
        'img', 'type', 'weight',
        'bundle', 'bundle_start', 'bundle_end',
        'banner', 'link_video',
        'benefit', 'benefit_image', 'benefit_icon'
    ];

    protected $casts = [
        'price' => 'array',
        'price_discount' => 'array',
        'stock' => 'array',
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

    public function bundles() {
        return $this->hasMany(Bundle::class, 'bundle_id', 'id');
    }

    public function carts() {
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }

    public function promotions() {
        return $this->hasMany(Promotion::class, 'product_id', 'id');
    }

    public function guides() {
        return $this->hasMany(Guide::class, 'product_id', 'id');
    }

    public function benefits() {
        return $this->hasMany(Benefit::class, 'product_id', 'id');
    }
}
