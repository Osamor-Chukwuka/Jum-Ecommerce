<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = ["id", "shopName", "accountManager", "phoneNumber", "phoneNumberTwo", "address", "city", "country", "bank", "accountNumber", "sortCode", "accountName", "email", "users_id"];
    protected $table = 'seller';

    // public function prouducts(){
    //     return $this->hasMany(Products::class);
    // }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orders(){
        return $this->hasMany(Orders::class);
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }
}
