<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Rental;
use App\Models\Category;
use App\Models\Products;
use App\Models\Pelanggan;
use App\Models\Detil_Rental; // Ensure this is correctly imported
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create users
        User::factory(5)->create();

        // Seed Detil_Rental with dependencies
        Detil_Rental::factory(10)
            ->recycle(Rental::factory(5)
            ->recycle(Pelanggan::factory(5)->create())
            ->create())
            ->recycle(Products::factory(20)
            ->recycle(Category::factory(5)->create())
            ->create())
            ->create();
    }
}
