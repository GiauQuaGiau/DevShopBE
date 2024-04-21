<?php

namespace Database\Seeders;

use App\Models\role;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleDefault extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        role::insert(
            [
                [
                    'id' => 1,
                    'name' => 'admin',
                    'created_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'id' => 2,
                    'name' => 'customer',
                    'created_at' => Carbon::now()->toDateTimeString()
                ],
            ]
        );
    }
}
