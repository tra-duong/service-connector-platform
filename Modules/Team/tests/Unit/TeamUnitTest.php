<?php

namespace Modules\Team\Tests\Unit;

use Tests\TestCase;
use Modules\Team\Models\Team;
use Modules\User\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamUnitTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    public function testAddMember()
    {
        $team = Team::factory()->create();
        $members = User::factory()->count(10)->create();
        $team->members()->sync($members->pluck('id')->toArray());
        dd($team->members);
    }
}
