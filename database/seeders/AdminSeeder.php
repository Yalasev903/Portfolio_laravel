<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Создание роли admin, если не существует
        $adminRole = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        // Создание пользователя-админа
        $admin = User::updateOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Admin',
            'password' => bcrypt('admin123'), // 🔒 Пароль по умолчанию
        ]);

        // Назначение роли
        $admin->assignRole($adminRole);
    }
}
