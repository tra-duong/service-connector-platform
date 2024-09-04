<?php

namespace Modules\Category\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Category\Models\CategoryType;
use Tests\TestCase;

class CategoryTypeFeatureTest extends TestCase
{
    // use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Create category types.
        for ($i = 0; $i < 10; $i++) {
            $cat = CategoryType::factory()->create();
        }
    }

    public function testGetListCategoryType()
    {
        $this->setUp();
        $url = route('api.categorytype.list');
        // Call get all categories.
        $response = $this->get($url);
        dd($response->json());
    }
}
