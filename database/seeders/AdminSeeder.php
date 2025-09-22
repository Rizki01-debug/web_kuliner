<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@kuliner.test'],
            [
                'name' => 'Admin Kuliner',
                'password' => Hash::make('password123'), 
                'is_admin' => true,
            ]
        );
    }
}
