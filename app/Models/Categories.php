<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    
    public function prouducts(){
        return $this->hasMany(Products::class);
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }

}
