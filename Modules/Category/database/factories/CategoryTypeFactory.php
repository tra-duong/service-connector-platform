<?php

namespace Modules\Category\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Common\Helpers\StringHelper;
use Modules\Category\Helpers\CategoryStatusHelper;
use Modules\Category\Models\CategoryType;

class CategoryTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = CategoryType::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'machine_name' => StringHelper::buildMachineName($this->faker->name),
            'status' => array_rand(CategoryStatusHelper::getAllStatus()),
        ];
    }
}
