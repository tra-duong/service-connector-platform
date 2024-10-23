<?php

namespace Modules\JobRequest\Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\JobRequest\Helpers\JobRequestHelper;
use Modules\JobRequest\Models\JobRequest;
use Modules\Team\Models\Team;
use Modules\User\Models\User;
use Tests\TestCase;

class CreateJobRequestUnitTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCreateJobRequest()
    {
        $team = Team::create();
        $author = User::factory()->create();
        $data = [
            'raw_request' => 'Request for job',
            'country' => 'Việt Nam',
            'city_id' => 1,
            'district_id' => 1,
            'ward_id' => 1,
            'street_id' => 'Nguyen Hue',
            'home_number' => '123',
            'lat' => 10.77689,
            'long' => 106.70098,
            'accuracy' => 10,
            'author' => $author->id,
            'files' => ['file1.jpg', 'file2.pdf'],
            'schedule_time' => now()->addDays(1),
            'start_time' => now()->addDays(1)->addHours(2),
            'approx_duration' => 2,
            'expired_time' => now()->addDays(2),
            'quantity' => 5,
            'assign_to_user' => 1,
            'assign_to_team' => null,
            'type' => array_rand(JobRequestHelper::getJobRequestType()),
            'assign_time' => now(),
            'cancel_time' => null,
            'completed_time' => null,
            'note' => 'Some notes here',
            'status' => array_rand(JobRequestHelper::allJobRequestStatus()),
        ];

        $jobRequest = JobRequest::create($data);
        $this->assertDatabaseHas('job_requests', [
            'raw_request' => 'Request for job',
            'city_id' => 1,
            'street_id' => 1,
        ]);
    }
}
