<?php

namespace Database\Seeders;

use run;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role_create',
            'role_edit',
            'role_status',
            'role_delete',
            'permission_create',
            'permission_edit',
            'permission_status',
            'permission_delete',
            'category_create',
            'category_edit',
            'category_delete',
            'post_create',
            'post_edit',
            'post_delete',
            'user_create',
            'user_edit',
            'user_banned',
        ];
        foreach($permissions as $permission){
        Permission::create(['name' => $permission]);
        }
    }

}
