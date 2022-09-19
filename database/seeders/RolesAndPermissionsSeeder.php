<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions

        // Tickets
        Permission::create(['name' => 'add tickets']);
        Permission::create(['name' => 'edit tickets']);
        Permission::create(['name' => 'preview tickets']);
        Permission::create(['name' => 'close tickets']);
        Permission::create(['name' => 'display tickets list']);

        // Ticket Types
        Permission::create(['name' => 'add ticket types']);
        Permission::create(['name' => 'edit ticket types']);
        Permission::create(['name' => 'inactivate ticket types']);
        Permission::create(['name' => 'display ticket types list']);

        // Departments
        Permission::create(['name' => 'add departments']);
        Permission::create(['name' => 'edit departments']);
        Permission::create(['name' => 'preview departments']);
        Permission::create(['name' => 'inactivate department']);
        Permission::create(['name' => 'display departments list']);

        // Chat
        Permission::create(['name' => 'create chat']);

        // permissions
        Permission::create(['name' => 'revoke permission']);
        Permission::create(['name' => 'add permission']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'employee'])
        ->givePermissionTo([
          'add tickets',
          'edit tickets',
          'preview tickets',
          'display tickets list'
        ]);

        $role = Role::create(['name' => 'manager'])
        ->givePermissionTo([
          'add tickets',
          'edit tickets',
          'preview tickets',
          'display tickets list',
          'add ticket types',
          'edit ticket types',
          'display ticket types list',
          'create chat'
        ]);

        $role = Role::create(['name' => 'admin']);
    }
}
