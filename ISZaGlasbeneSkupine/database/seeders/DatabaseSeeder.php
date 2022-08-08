<?php

namespace Database\Seeders;

use App\Models\Glasbenaskupina;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@gmail.com'
        ]);

        Listing::factory(12)->create([
            'user_id' => $user->id
        ]);

        Glasbenaskupina::factory(12)->create([
            'user_id' => $user->id
        ]);
    }
}
