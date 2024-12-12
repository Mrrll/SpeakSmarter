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
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'edgarmarrollo@gmail.com',
            'password' => Hash::make('1234')
        ]);
        $admin->assignRole('admin');
        $editor = User::create([
            'name' => 'editor',
            'email' => 'editor@gmail.com',
            'password' => Hash::make('1234')
        ]);
        $editor->assignRole('editor');
    }
}
