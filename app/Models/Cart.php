<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category_id', 'product_id', 'users_id', 'price', 'description', 'quantity', 'sellers_id'];
    protected $table = 'cart';

    public function orders(){
       return $this->hasMany(Orders::class);
    }

    public function seller(){
        return $this->belongsTo(Seller::class);
    }
}
