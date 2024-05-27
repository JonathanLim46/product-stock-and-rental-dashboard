<?php

namespace Database\Factories;

use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rental>
 */
class RentalFactory extends Factory
{


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $rentalAwal = fake()->date('Y-m-d');

        return [
            'id_pelanggan'=>Pelanggan::factory(),
            'rental_awal' => fake()->date('Y-m-d'),
            'rental_akhir' => fake()->dateTimeBetween($rentalAwal,'+1 month'),
            'status_rental'=>fake()->boolean()
        ];
    }
}
