<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rootUser = User::create([
            'name' => 'Root',
            'email' => 'root@gmail.com',
            'username' => 'root',
            'password' => Hash::make('root'),
            'is_active' => true,
        ]);
        $rootUser->assignRole('Developer');
    }
}
