<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class ChirpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::count() < 3 ? [
            User::create([
                'name'=>'Alice Dev',
                'email'=>'alice@example.com',
                'password'=>bcrypt('password')
            ]),
            User::create([
                'name' => 'Bob Blanco',
                'email' => 'bob@example.com',
                'password' => bcrypt('password')
            ]),
            User::create([
                'name' => 'Renny Blanco',
                'email' => 'rey@example.com',
                'password' => bcrypt('password')
            ])
        ] : User::take(3)->get();

        $chirps = [
            'Descubriendo Laravel - donde ha estado toda mi vida?',
            'Construyendo cosas buenas con Chirper',
            'Laravel\'s Eloquent ORM. magia pura!',
            'Desplegando mi primera app con Laravel Cloud.',
            'Blade components, muy fácil',
            'Viernes de deploy, no problem!',
        ];

        foreach ($chirps as $message) {
            $users->random()->chirps()->create([
                'mensaje' => $message,
                'created_at' => now()->subMinutes(rand(5, 1440)),
            ]);
        }
    }
}
