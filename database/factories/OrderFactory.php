<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $randomProduct = DB::table('products')
            ->inRandomOrder()
            ->first();

        return [
            'customer_id' => $this->faker->numberBetween(1, 100),
            'customer_name' => $this->faker->name(),
            'product_name' => $randomProduct->name,
            'price' => $this->faker->numberBetween(),
            'qty' => $this->faker->numberBetween(10, 10000)
        ];
    }
}
