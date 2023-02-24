<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seller>
 */
class SellerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'id' => $this->faker->random_int(1, 9),
            'shopName' => $this->faker->company(),
            'accountManager' => $this->faker->name(),
            'phoneNumber' => $this->faker->phoneNumber(),
            'phoneNumberTwo' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'country' => $this->faker->country(),
            'bank' => $this->faker->company(),
            'accountNumber' => $this->faker->numberBetween(1, 11),
            'email' => $this->faker->email(),
            'country' => $this->faker->country(),
        ];
    }
}








// $table->id();
// $table->string('shopName');
// $table->string('accountManager');
// $table->string('phoneNumber');
// $table->string('phoneNumberTwo');
// $table->longText('address');
// $table->string('city');
// $table->string('country');
// $table->string('bank');
// $table->string('accountNumber');
// $table->string('email');
// $table->timestamps();