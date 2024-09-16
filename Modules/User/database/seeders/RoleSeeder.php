<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Common\Helpers\RoleHelper;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = RoleHelper::values();
        foreach ($roles as $role) {
            if (Role::where('name', $role)->doesntExist()) {
                Role::create(['name' => $role]);
            }
        }
    }
}
