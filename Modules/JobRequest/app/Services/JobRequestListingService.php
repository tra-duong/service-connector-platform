<?php

namespace Modules\JobRequest\Services;

use Modules\JobRequest\Services\Interfaces\JobRequestListingServiceInterface;
use Modules\JobRequest\Repositories\Interfaces\JobRequestListingRepositoryInterface;

class JobRequestListingService implements JobRequestListingServiceInterface
{
    protected JobRequestListingRepositoryInterface $jobRequestRepository;
    public function __construct(JobRequestListingRepositoryInterface $jobRequestRepository)
    {
        $this->jobRequestRepository = $jobRequestRepository;
    }

    /**
     * @inheritDoc
     */
    public function getLatestJobRequest()
    {
        return $this->jobRequestRepository->getLatestJobRequest();
    }
}
