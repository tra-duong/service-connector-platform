<?php

namespace Modules\JobRequest\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JobRequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\JobRequest\Models\JobRequest::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

