<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Modules\User\Models\User;
use Illuminate\Database\Seeder;
use Modules\Category\Database\Seeders\CategoryDatabaseSeeder;
use Modules\SocialAuth\Database\Seeders\SocialAuthDatabaseSeeder;
use Modules\SocialAuth\Database\Seeders\SocialProviderSeeder;
use Modules\User\Database\Seeders\UserDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategoryDatabaseSeeder::class,
            SocialAuthDatabaseSeeder::class,
            UserDatabaseSeeder::class,
        ]);
    }
}
