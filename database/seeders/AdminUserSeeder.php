<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Docente Administrador',
                'password' => 'password', // el cast 'hashed' del modelo lo hashea
                'is_admin' => true,
                'phone' => null,
                'professional_url' => 'https://www.linkedin.com/in/admin',
                'photo_path' => null,
            ]
        );
    }
}