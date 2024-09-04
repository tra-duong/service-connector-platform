<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\User\Enums\RoleEnum;
use Spatie\Permission\Models\Role;

class RoleSeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = RoleEnum::getRoles();
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}
