<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name',
        'email', 'username',
        'password', 'role',
        'gender', 'dob',
        'address_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function address() {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }
    public function addresses() {
        return $this->hasMany(Address::class, 'user_id', 'id');
    }
    public function refunds() {
        return $this->hasMany(Refund::class, 'user_id', 'id');
    }
    public function isUser()
    {
        if ($this->role == '0') {
            return true;
        }
        return false;
    }
    public function isAdmin()
    {
        if ($this->role == '1') {
            return true;
        }
        return false;
    }
}
