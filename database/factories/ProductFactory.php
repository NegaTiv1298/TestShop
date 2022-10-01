<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $randomCategory = DB::table('categories')
            ->inRandomOrder()
            ->first();

        return [
            'category_id' => $randomCategory->id,
            'code' => $this->faker->uuid(),
            'name' => "Shares of ".$this->faker->company(),
            'price' => $this->faker->numberBetween(),
            'qty' => $this->faker->numberBetween(10, 10000)
        ];
    }
}
