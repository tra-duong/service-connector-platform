<?php

namespace Modules\SocialAuth\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\SocialAuth\Models\SocialProvider;

class SocialProviderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = SocialProvider::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
