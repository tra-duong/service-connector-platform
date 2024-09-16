<?php

namespace Modules\SocialAuth\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\SocialAuth\Helpers\AuthProviderHelper;
use Modules\SocialAuth\Models\SocialProvider;

class SocialProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (AuthProviderHelper::values() as $key => $provider) {
            if (SocialProvider::where('machine_name', $key)->doesntExist()) {
                SocialProvider::create([
                    'name' => $provider,
                    'machine_name' => $key,
                ]);
            }
        }
    }
}
