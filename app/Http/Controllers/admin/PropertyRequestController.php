<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service\admin\PropertyRequestService;
use Illuminate\Http\Request;

class PropertyRequestController extends Controller
{
    private $propertyRequestService;

    public function __construct(PropertyRequestService $propertyRequestService)
    {
        $this->propertyRequestService = $propertyRequestService;
    }

    public function index()
    {
        $consultationRequests = $this->propertyRequestService->getAllConsultationRequests();
        $visistRequests = $this->propertyRequestService->getAllVisitRequests();
        return view('admin.property_request.index', compact('consultationRequests', 'visistRequests'));
    }

    public function toggleStatus($id)
    {
        $this->propertyRequestService->toggleStatus($id);
        return redirect()->route('admin.property-request.index');
    }

    public function markAllSeen($requestType)
    {
        $this->propertyRequestService->markAllSeen($requestType);
        return redirect()->route('admin.property-request.index');
    }
}
