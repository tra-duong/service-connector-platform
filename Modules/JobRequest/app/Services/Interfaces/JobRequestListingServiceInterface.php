<?php
namespace Modules\JobRequest\Services\Interfaces;

interface JobRequestListingServiceInterface
{
  /**
   * Get latest job request.
   */
  function getLatestJobRequest();
}
