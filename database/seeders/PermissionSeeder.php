<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();


        Permission::create(['name' => 'publish state']);
        Permission::create(['name' => 'unpublish state']);

        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'slave_user']);
        $role2->givePermissionTo('publish state');
        $role2->givePermissionTo('unpublish state');

        $role3 = Role::create(['name' => 'master-user']);
        $user = \App\Models\User::factory()->create([
            'name' => 'Example User',
            'email' => 'test@example.com',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Example Admin User',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Example Super-Admin User',
            'email' => 'superadmin@example.com',
        ]);
        $user->assignRole($role3);
    }
}
