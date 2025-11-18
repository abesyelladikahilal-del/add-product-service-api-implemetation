<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   public function definition()
{
    return [
        'name' => $this->faker->name(),
        'company' => $this->faker->company(),
        'phone' => $this->faker->phoneNumber(),
        'email' => $this->faker->unique()->safeEmail(),
        'country' => $this->faker->country(),
        'status' => $this->faker->randomElement(['Active','Inactive']),
    ];
}

}
