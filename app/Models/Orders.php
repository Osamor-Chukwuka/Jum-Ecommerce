<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    public function seller(){
        return $this->belongsTo(Seller::class);
    }


    protected $fillable = ['cart_name', 'category_id', 'product_id', 'users_id', 'sellers_id', 'cart_price', 'cart_description', 'cart_quantity'];
    protected $table = 'orders';
}
