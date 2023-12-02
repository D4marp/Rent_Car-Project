<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'damar',
            'email' => 'damar@example.com',
            'password' => bcrypt('321'),
            'is_admin' => 1,
        ]);
    }
}
