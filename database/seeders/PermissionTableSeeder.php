<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::insert([
            ['name' => 'RolePermissionMenu', 'group_name' => 'RolePermissionManagement', 'guard_name' => 'web'],

            ['name' => 'role.index', 'group_name' => 'RolePermissionManagement', 'guard_name' => 'web'],
            ['name' => 'role.create', 'group_name' => 'RolePermissionManagement', 'guard_name' => 'web'],
            ['name' => 'role.edit', 'group_name' => 'RolePermissionManagement', 'guard_name' => 'web'],
            ['name' => 'role.destroy', 'group_name' => 'RolePermissionManagement', 'guard_name' => 'web'],

            ['name' => 'permission.index', 'group_name' => 'RolePermissionManagement', 'guard_name' => 'web'],
            ['name' => 'permission.create', 'group_name' => 'RolePermissionManagement', 'guard_name' => 'web'],
            ['name' => 'permission.edit', 'group_name' => 'RolePermissionManagement', 'guard_name' => 'web'],
            ['name' => 'permission.destroy', 'group_name' => 'RolePermissionManagement', 'guard_name' => 'web'],

            ['name' => 'role-permission.index', 'group_name' => 'RolePermissionManagement', 'guard_name' => 'web'],
            ['name' => 'role-permission.create', 'group_name' => 'RolePermissionManagement', 'guard_name' => 'web'],
            ['name' => 'role-permission.edit', 'group_name' => 'RolePermissionManagement', 'guard_name' => 'web'],
            ['name' => 'role-permission.destroy', 'group_name' => 'RolePermissionManagement', 'guard_name' => 'web'],

            ['name' => 'SettingMenu', 'group_name' => 'SettingManagement', 'guard_name' => 'web'],
            ['name' => 'default.setting', 'group_name' => 'SettingManagement', 'guard_name' => 'web'],
            ['name' => 'seo.setting', 'group_name' => 'SettingManagement', 'guard_name' => 'web'],
            ['name' => 'mail.setting', 'group_name' => 'SettingManagement', 'guard_name' => 'web'],
            ['name' => 'sms.setting', 'group_name' => 'SettingManagement', 'guard_name' => 'web'],

            ['name' => 'EmployeeMenu', 'group_name' => 'EmployeeManagement', 'guard_name' => 'web'],
            ['name' => 'employee.index', 'group_name' => 'EmployeeManagement', 'guard_name' => 'web'],
            ['name' => 'employee.create', 'group_name' => 'EmployeeManagement', 'guard_name' => 'web'],
            ['name' => 'employee.edit', 'group_name' => 'EmployeeManagement', 'guard_name' => 'web'],
            ['name' => 'employee.destroy', 'group_name' => 'EmployeeManagement', 'guard_name' => 'web'],
            ['name' => 'employee.trash', 'group_name' => 'EmployeeManagement', 'guard_name' => 'web'],
            ['name' => 'employee.restore', 'group_name' => 'EmployeeManagement', 'guard_name' => 'web'],
            ['name' => 'employee.delete', 'group_name' => 'EmployeeManagement', 'guard_name' => 'web'],
            ['name' => 'employee.status', 'group_name' => 'EmployeeManagement', 'guard_name' => 'web'],

            ['name' => 'UserMenu', 'group_name' => 'UserManagement', 'guard_name' => 'web'],
            ['name' => 'user.index', 'group_name' => 'UserManagement', 'guard_name' => 'web'],
            ['name' => 'user.edit', 'group_name' => 'UserManagement', 'guard_name' => 'web'],
            ['name' => 'user.destroy', 'group_name' => 'UserManagement', 'guard_name' => 'web'],
            ['name' => 'user.trash', 'group_name' => 'UserManagement', 'guard_name' => 'web'],
            ['name' => 'user.restore', 'group_name' => 'UserManagement', 'guard_name' => 'web'],
            ['name' => 'user.delete', 'group_name' => 'UserManagement', 'guard_name' => 'web'],
        ]);

        $this->command->info('Permissions added successfully.');

        return;
    }
}
