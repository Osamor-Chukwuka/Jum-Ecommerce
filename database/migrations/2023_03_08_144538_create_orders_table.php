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
            $table->foreignId('category_id')->references('category_id')->on('cart');
            $table->foreignId('product_id')->references('product_id')->on('cart');
            $table->foreignId('users_id')->references('users_id')->on('cart');
            $table->foreignId('sellers_id')->constrained('seller', 'users_id');
            $table->string('cart_name');
            $table->string('cart_price');
            $table->string('cart_description');
            $table->string('cart_quantity');
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
