<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        // مستخدم مدير النظام
        $admin = User::firstOrCreate([
            'email' => 'admin@example.com'
        ], [
            'name' => 'Admin User',
            'password' => bcrypt('password123') // كلمة السر الافتراضية
        ]);
        $admin->assignRole('admin');

        // مستخدم مشرف مدرسة
        $schoolManager = User::firstOrCreate([
            'email' => 'manager@example.com'
        ], [
            'name' => 'School Manager',
            'password' => bcrypt('password123')
        ]);
        $schoolManager->assignRole('school_manager');

        // مستخدم ولي أمر
        $guardian = User::firstOrCreate([
            'email' => 'guardian@example.com'
        ], [
            'name' => 'Guardian User',
            'password' => bcrypt('password123')
        ]);
        $guardian->assignRole('guardian');

        // مستخدم سائق
        $driver = User::firstOrCreate([
            'email' => 'driver@example.com'
        ], [
            'name' => 'Bus Driver',
            'password' => bcrypt('password123')
        ]);
        $driver->assignRole('driver');
    }
}
