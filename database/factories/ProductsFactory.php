<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_produk' => fake()->word(),
            'deskripsi_produk' => fake()->sentence(),
            'stok_produk' => fake()->randomNumber(),
            'harga_produk' => fake()->randomNumber(),
            'category_id' => Category::factory()
        ];
    }
}
