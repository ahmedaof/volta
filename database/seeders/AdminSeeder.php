<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'amr Shaaban', 
            'email' => 'amr@volta.com',
            'password' => bcrypt('01033284331'),
            'role' => 'admin',
            'phone' => '01033284331'
        ]);
    }
}
