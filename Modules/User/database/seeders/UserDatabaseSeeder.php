<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo PHP_EOL;
        echo PHP_EOL;
        echo PHP_EOL;
        $this->command->info('==================================== Calling User & Role seeder ====================================');
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
        ]);

    }
}
