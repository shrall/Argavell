<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use Sluggable;
    // use SoftDeletes;

    protected $fillable = [
        'name', 'slug',
        'price', 'price_discount', 'stock',
        'description', 'size', 'facts', 'howtouse', 'ingredients',
        'img', 'type', 'weight',
        'bundle', 'bundle_start', 'bundle_end'
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

    public function bundles() {
        return $this->hasMany(Bundle::class, 'bundle_id', 'id');
    }

    public function carts() {
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }
    // protected static function boot()
    // {
    //     static::deleting(function ($instance) {
    //         $instance->child->each->delete();
    //     });

    //     static::restoring(function ($instance) {
    //         $instance->child->each->restore();
    //     });
    // }
}
