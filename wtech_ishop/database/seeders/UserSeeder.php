<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'username' => 'James Bond',
                'role' => 'user',
                'email' => 'jamesbond@gmail.com',
                'password' => hash('sha256', '12345'),
            ],
            [
                'username' => 'Picklemaster',
                'role' => 'user',
                'email' => 'picklemaster@gmail.com',
                'password' => hash('sha256', '12345'),
            ],
            [
                'username' => 'admin',
                'role' => 'admin',
                'email' => 'admin@ishop.com',
                'password' => hash('sha256', '12345'),
            ]
        ]);
    }
}
