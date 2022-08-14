<?php

namespace Database\Seeders;

use App\Models\Glasbenaskupina;
use App\Models\Instrument;
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


        Glasbenaskupina::factory(12)->create([
            'user_id' => $user->id
        ]);

        Instrument::create([
            'user_id' => $user->id,
            'ime' => 'Fender Stratocaster.', 
            'cena' => '530',
            'vrsta' => 'Kitara'
        ]);

        Instrument::create([
            'user_id' => $user->id,
            'ime' => 'FAZIOLI', 
            'cena' => '4500',
            'vrsta' => 'Klavir'
        ]);

        Instrument::create([
            'user_id' => $user->id,
            'ime' => 'Shure mic', 
            'cena' => '220',
            'vrsta' => 'Mikrofon'
        ]);

        Instrument::create([
            'user_id' => $user->id,
            'ime' => 'Fender jazz bass', 
            'cena' => '800',
            'vrsta' => 'Bas kitara'
        ]);

        
        Instrument::create([
            'user_id' => $user->id,
            'ime' => 'Pearl drum set', 
            'cena' => '900',
            'vrsta' => 'Bobni'
        ]);


        
        Instrument::factory(5)->create([
            'user_id' => $user->id
        ]);
        
    }
}
