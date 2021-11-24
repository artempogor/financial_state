<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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


        Permission::create(['name' => 'отправка отчётов']);
        Permission::create(['name' => 'просмотр фин.отчётности']);

        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'user']);
        $role2->givePermissionTo('просмотр фин.отчётности');
        $role2->givePermissionTo('отправка отчётов');
        $user = \App\Models\User::create([
            'login' => 'user_test',
            'ikul'=>'1234',
            'password'=>Hash::make("password"),
        ]);
        $admin = \App\Models\User::create([
            'login' => 'admin_test',
            'ikul'=>'0',
            'password'=>Hash::make("password"),
        ]);
        $admin->assignRole($role1);
        $user->assignRole($role2);
    }
}
