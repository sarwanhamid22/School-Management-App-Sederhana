<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Membersihkan cache dari spatie permission
        app()['cache']->forget('spatie.permission.cache');

        // Membuat roles
        $role_admin = Role::updateOrCreate(['name' => 'admin']);
        $role_teacher = Role::updateOrCreate(['name' => 'teacher']);
        $role_student = Role::updateOrCreate(['name' => 'student']);

        // Membuat permissions
        $permission_admin = Permission::updateOrCreate(['name' => 'access-admin-all']);
        $permission_teacher = Permission::updateOrCreate(['name' => 'access-teacher']);
        $permission_student = Permission::updateOrCreate(['name' => 'access-student']);

        // Memberikan permission kepada roles
        $role_admin->givePermissionTo($permission_admin);
        $role_teacher->givePermissionTo($permission_teacher);
        $role_student->givePermissionTo($permission_student);
    }
}
