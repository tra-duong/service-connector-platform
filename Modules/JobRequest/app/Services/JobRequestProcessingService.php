<?php

namespace Modules\JobRequest\Services;

use Modules\JobRequest\Repositories\Interfaces\JobRequestProcessingRepositoryInterface;
use Modules\JobRequest\Services\Interfaces\JobRequestProcessingServiceInterface;

class JobRequestProcessingService implements JobRequestProcessingServiceInterface
{
    protected JobRequestProcessingRepositoryInterface $jobRequestRepository;

    public function __construct(JobRequestProcessingRepositoryInterface $jobRequestRepository)
    {
        $this->jobRequestRepository = $jobRequestRepository;
    }

    /**
     * {@inheritDoc}
     */
    public function addJobRequest()
    {
        return $this->jobRequestRepository->addJobRequest();
    }
}
