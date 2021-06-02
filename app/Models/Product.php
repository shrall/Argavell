<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

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
}
