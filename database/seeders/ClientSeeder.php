<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where("role", "user")->exists()) {
            User::create([
                'name' => 'Ivan',
                'email' => 'ivan@a.com',
                'password' => Hash::make('ivan1234'),
                'role' => 'user', 
            ]);
        }
    }
}
