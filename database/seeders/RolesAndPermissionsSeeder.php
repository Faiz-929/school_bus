<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // 1) مسح البيانات القديمة لتجنب التكرار
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 2) إنشاء الصلاحيات الأساسية
        $permissions = [
            'manage students',
            'manage guardians',
            'manage schools',
            'manage buses',
            'manage drivers',
            'manage routes',
            'view reports',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // 3) إنشاء الأدوار وربط الصلاحيات
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        $schoolManager = Role::firstOrCreate(['name' => 'school_manager']);
        $schoolManager->givePermissionTo([
            'manage students',
            'manage buses',
            'manage drivers',
            'view reports',
        ]);

        $guardian = Role::firstOrCreate(['name' => 'guardian']);
        $guardian->givePermissionTo([
            'view reports',
        ]);

        $driver = Role::firstOrCreate(['name' => 'driver']);
        $driver->givePermissionTo([
            'view reports',
        ]);
    }
}
