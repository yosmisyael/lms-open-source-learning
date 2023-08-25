<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'manage-course']);
        Permission::create(['name' => 'manage-user']);
        Permission::create(['name' => 'access-admin-panel']);
        Permission::create(['name' => 'edit-course']);
        Permission::create(['name' => 'enroll-course']);

        Role::create(['name' => 'admin']);
        // Role::create(['name' => 'teacher']);
        Role::create(['name' => 'student']);

        $admin = Role::findByName('admin');
        $admin->givePermissionTo('manage-course');
        $admin->givePermissionTo('manage-user');
        $admin->givePermissionTo('access-admin-panel');
        
        // $teacher = Role::findByName('teacher');
        // $teacher->givePermissionTo('edit-course');

        $student = Role::findByName('student');
        $student->givePermissionTo('enroll-course');
    }
}
