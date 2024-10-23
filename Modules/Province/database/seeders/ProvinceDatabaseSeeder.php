<?php

namespace Modules\Province\Database\Seeders;

use Illuminate\Database\Seeder;

class ProvinceDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo PHP_EOL;
        echo PHP_EOL;
        echo PHP_EOL;
        $this->command->info('==================================== Calling Province Seeder ====================================');
        $this->call([
            ProvinceSeeder::class,
        ]);
    }
}
