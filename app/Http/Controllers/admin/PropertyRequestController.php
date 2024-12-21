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
        $propertyRequests = $this->propertyRequestService->getAllPropertyRequests();
        return view('admin.property_request.index', compact('propertyRequests'));
    }
}
