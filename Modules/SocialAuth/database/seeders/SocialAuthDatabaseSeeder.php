<?php

namespace Modules\SocialAuth\Database\Seeders;

use Illuminate\Database\Seeder;

class SocialAuthDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo PHP_EOL;
        echo PHP_EOL;
        echo PHP_EOL;
        $this->command->info('==================================== Calling Social Auth seeder ====================================');
        $this->call([
            SocialProviderSeeder::class,
        ]);
    }
}
