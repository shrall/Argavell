<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'status', 'order_number', 'date',
        'shipment_name', 'shipment_etd', 'shipping_cost', 'price_total', 'qty_total', 'weight_total', 'notes', 'snaptoken', 'is_cetak',
        'user_id', 'payment_id', 'address_id', 'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id', 'id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'transaction_id', 'id');
    }

    public function proofs()
    {
        return $this->hasMany(Proof::class, 'transaction_id', 'id');
    }
}
