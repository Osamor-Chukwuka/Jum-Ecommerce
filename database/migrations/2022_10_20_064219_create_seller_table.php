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
        Schema::create('seller', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users');
            $table->string('shopName');
            $table->string('accountManager');
            $table->string('phoneNumber');
            $table->string('phoneNumberTwo');
            $table->longText('address');
            $table->string('city');
            $table->string('country');
            $table->string('bank');
            $table->string('accountNumber');
            $table->string('sortCode');
            $table->string('accountName');
            $table->string('email');
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
        Schema::dropIfExists('seller');
    }
};
