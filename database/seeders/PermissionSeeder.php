<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['guard_name' =>'admin', 'name' =>'add']);
        Permission::create(['guard_name'=>'admin','name' => 'delete']);
        Permission::create(['guard_name'=>'admin','name'=> 'update']);
        Permission::create(['guard_name'=>'admin' ,'name'=> 'view']);

    }
}
