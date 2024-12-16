<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Service\client\PropertyService;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    private $propertyService;

    public function __construct(PropertyService $propertyService)
    {
        $this->propertyService = $propertyService;
    }

    public function index(Request $request)
    {
        // Lấy số lượng bất động sản mỗi trang từ query string (mặc định là 12)
        $perPage = $request->input('per_page', 12);

        // Lấy danh sách bất động sản với phân trang
        $properties = $this->propertyService->getAllProperties($perPage);

        // Giữ lại tất cả các tham số trong query string khi phân trang
        return view('client.property.index', compact('properties'))->with('properties', $properties->appends($request->all()));
    }

    public function detail($id)
    {
        $property = $this->propertyService->getPropertyById($id);
        return view('client.property.detail', compact('property'));
    }
}
