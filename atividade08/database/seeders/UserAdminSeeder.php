<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserAdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin tester',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin'
        ]);
    }
}