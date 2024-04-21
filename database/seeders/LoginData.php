<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LoginData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert(
            [
                [
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
                    'lang' => 'en',
                    'role' => 'admin',
                    'created_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'firstname' => 'Duy',
                    'middlename' => '',
                    'lastname' => 'Nguyễn',
                    'phone' => '0943082871',
                    'address' => 'Q12, TP HCM',
                    'gender' => false,
                    // 
                    'username' => 'customer',
                    'email' => 'customer@gmail.com',
                    'password' => Hash::make('hehehe'),
                    'lang' => 'vi',
                    'role' => 'customer',
                    'created_at' => Carbon::now()->toDateTimeString()
                ],
            ]
        );
    }
}
