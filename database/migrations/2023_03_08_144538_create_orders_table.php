<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('cart');
            $table->foreignId('product_id')->constrained('cart');
            $table->foreignId('users_id')->constrained('cart');
            $table->foreignId('sellers_id')->constrained('seller', 'users_id');
            $table->foreignId('cart_name')->constrained('cart', 'name');
            $table->foreignId('cart_price')->constrained('cart', 'price');
            $table->foreignId('cart_description')->constrained('cart', 'description');
            $table->foreignId('cart_quantity')->constrained('cart', 'quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};

// $table->id();
// $table->foreignId('category_id')->constrained();
// $table->foreignId('product_id')->constrained();
// $table->foreignId('users_id')->constrained();
// $table->string('name');
// $table->string('price');
// $table->longText('description');
// $table->integer('quantity')->default(1);
