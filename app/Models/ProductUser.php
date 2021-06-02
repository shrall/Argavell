<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductUser extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'user_id',
        'qty', 'price', 'price_discount'
    ];

    public function transactions(){
        return $this->hasMany(Transaction::class, 'product_users_id', 'id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
