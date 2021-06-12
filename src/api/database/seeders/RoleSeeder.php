<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::factory()->create([
            'name' => 'Admin'
        ]);

        $editor = Role::factory()->create([
            'name' => 'Editor'
        ]);

        $viewer = Role::factory()->create([
            'name' => 'Viewer'
        ]);

        $permissions = Permission::all();

        $admin->permissions()->attach($permissions->pluck('id'));

        $editor->permissions()->attach([1,2]);

        $viewer->permissions()->attach(1);

        // foreach ($permissions as $permission){
        //     DB::table('role_permissions')->insert([
        //         'permission_id' => $permission->id,
        //         'role_id' => $admin->id,
        //     ]);
        // }
    }
}
