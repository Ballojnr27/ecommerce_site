<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function runs()
    {
        User::updateOrCreate([
            'email' => 'admin@ballo27.com',
        ], [
            'name' => 'Admin',
            'password' => Hash::make('Ballojnr27'),
            'security_ques' => 'Football',
            'role' => 'admin',
        ]);
    }
}

