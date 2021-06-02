<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name',
        'phone', 'address', 'address_type',
        'city', 'district', 'postal_code',
        'user_id',
    ];
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function users() {
        return $this->hasOne(User::class, 'address_id', 'id');
    }
}
