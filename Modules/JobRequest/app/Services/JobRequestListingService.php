<?php

namespace Modules\JobRequest\Services;

use Modules\JobRequest\Repositories\Interfaces\JobRequestListingRepositoryInterface;
use Modules\JobRequest\Services\Interfaces\JobRequestListingServiceInterface;

class JobRequestListingService implements JobRequestListingServiceInterface
{
    protected JobRequestListingRepositoryInterface $jobRequestRepository;

    public function __construct(JobRequestListingRepositoryInterface $jobRequestRepository)
    {
        $this->jobRequestRepository = $jobRequestRepository;
    }

    /**
     * {@inheritDoc}
     */
    public function getLatestJobRequest()
    {
        return $this->jobRequestRepository->getLatestJobRequest();
    }
}
