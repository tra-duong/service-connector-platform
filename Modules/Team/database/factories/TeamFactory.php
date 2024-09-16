<?php

namespace Modules\Team\Database\Factories;

use Modules\Team\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Team::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'leader' => null,
            'parent_team' => null,
        ];
    }
}

