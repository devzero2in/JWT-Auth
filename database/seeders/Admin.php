<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
           'username' => 'admin',
           'email' => 'admin@email.com', 
           'password' => Hash::make('password'),
           'role' => 'admin',
           'is_active' => 1
        ]);

        $user_id = $user->id;

        UserDetail::create([
            'user_id' => $user_id,
            'first_name' => 'Site',
            'last_name' => 'Admin', 
        ]);
    }
}
