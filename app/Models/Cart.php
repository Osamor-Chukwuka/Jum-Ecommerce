<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category_id', 'product_id', 'users_id', 'price', 'description', 'quantity'];
    protected $table = 'cart';
}
