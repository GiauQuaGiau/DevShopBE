<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LoginData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'firstname' => 'Duy',
            'middlename' => 'Khánh',
            'lastname' => 'Nguyễn',
            'phone' => '0943082871',
            'address' => 'Q12, TP HCM',
            'gender' => false,
            // 
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('hehehe'),
        ]);
    }
}
