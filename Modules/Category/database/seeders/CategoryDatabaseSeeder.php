<?php

namespace Modules\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Category\Database\Seeders\CategorySeeder;
use Modules\Category\Database\Seeders\CategoryTypeSeeder;

class CategoryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo PHP_EOL;
        echo PHP_EOL;
        echo PHP_EOL;
        $this->command->info('==================================== Calling Category seeder ====================================');
        $this->call([
            CategoryTypeSeeder::class,
            CategorySeeder::class,
        ]);
    }
}
