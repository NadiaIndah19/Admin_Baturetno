<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        $admin->givePermissionTo('admin');

        $warga = Role::create([
            'name' => 'warga',
            'guard_name' => 'web'
        ]);

        $warga->givePermissionTo('warga');
    }
}
