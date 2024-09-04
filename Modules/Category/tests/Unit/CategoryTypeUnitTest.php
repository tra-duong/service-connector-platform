<?php

namespace Modules\Category\Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Modules\Common\Helpers\StringHelper;
use Modules\Category\Models\CategoryType;
use Modules\Category\Tests\Unit\CategoryUnitTest;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTypeUnitTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCreateType()
    {
        $name = Str::random(20);
        $machine_name = StringHelper::buildMachineName(Str::random(20));
        // Modules\Category\Models\CategoryType
        // Modules\Category\Tests\Unit\CategoryTypeUnitTest
        CategoryType::create([
            'name' => $name,
            'machine_name' => $machine_name,
        ]);

        $this->assertDatabaseHas('category_types', [
            'name' => $name,
            'machine_name' => $machine_name,
        ]);
    }

    /**
     * Test create Type with no Name.
     *
     * @return void
     */
    public function testCreateNotValidValue()
    {
        $this->expectException(QueryException::class);
        CategoryType::create([]);
    }
}
