<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'categories_id', 'price', 'description', 'seller_id'];

    public function cart(){
        return $this->hasOne(Cart::class);
    }

    public function seller(){
        return $this->belongsTo(Seller::class);
    }
}

