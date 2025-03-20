<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cart;
use App\Models\Location;
use App\Models\Experience;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Location::factory(10)->create();
        Experience::factory(10)->create();
        Cart::factory(10)->create();
    }
}
