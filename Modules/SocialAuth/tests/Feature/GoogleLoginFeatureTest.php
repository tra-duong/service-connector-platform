<?php

namespace Modules\SocialAuth\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Category\Models\CategoryType;
use Tests\TestCase;

class GoogleLoginFeatureTest extends TestCase
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

    public function testCallAuth()
    {

        $this->setUp();
        $url = route('api.social.login.google');
        // Call get all categories.
        $response = $this->get($url);
        dd($response);
        dd($response->json());
    }
}
