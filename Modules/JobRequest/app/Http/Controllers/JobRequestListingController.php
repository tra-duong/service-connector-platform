<?php

namespace Modules\JobRequest\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\JobRequest\Services\Interfaces\JobRequestServiceListingInterface;

class JobRequestListingController extends Controller
{
    protected JobRequestServiceListingInterface $listingService;
    public function __construct(JobRequestServiceListingInterface $listingService)
    {
        $this->listingService = $listingService;
    }

    /**
     * Latest job requests.
     */
    public function latest()
    {
        return $this->listingService->getLatestJobRequest();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobrequest::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('jobrequest::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('jobrequest::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
