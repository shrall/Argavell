<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'status', 'order_number', 'date',
        'payment_id', 'shipment_id', 'product_users_id', 'address_id', 'shipping_cost'
    ];

    public function payment() {
        return $this->belongsTo(Payment::class, 'payment_id', 'id');
    }

    public function shipment() {
        return $this->belongsTo(User::class, 'shipment_id', 'id');
    }

    public function productuser() {
        return $this->belongsTo(ProductUser::class, 'product_users_id', 'id');
    }

    public function address() {
        return $this->belongsTo(User::class, 'address_id', 'id');
    }
}
