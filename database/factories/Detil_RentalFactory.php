<?php

namespace Database\Factories;

use App\Models\Rental;
use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Detil_Rental>
 */
class Detil_RentalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'rental_id'=>Rental::factory(),
            'produk_id'=>Products::factory(),
            'total_barang'=>fake()->numberBetween(5,50)
        ];
    }
}
