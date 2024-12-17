<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Service\client\ProjectService;
use App\Service\client\PropertyService;
use App\Service\client\PropertyTypeService;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    private $propertyService;
    private $propertyTypeService;
    private $projectService;

    public function __construct(PropertyService $propertyService, PropertyTypeService $propertyTypeService, ProjectService $projectService)
    {
        $this->propertyService = $propertyService;
        $this->propertyTypeService = $propertyTypeService;
        $this->projectService = $projectService;
    }

    public function index(Request $request)
    {
        // Lấy số lượng bất động sản mỗi trang từ query string (mặc định là 12)
        $perPage = $request->input('per_page', 12);

        // Các tham số tìm kiếm
        $filters = [
            'province' => $request->input('province'),
            'project_id' => $request->input('project'),
            'deal_type' => $request->input('deal_type'),
            'property_type' => $request->input('property_type'),
            'price_min' => $request->input('price_min'),
            'price_max' => $request->input('price_max'),
            'area_min' => $request->input('area_min'),
            'area_max' => $request->input('area_max'),
            'bedrooms' => $request->input('bedrooms'),
            'bathrooms' => $request->input('bathrooms'),
            'keyword' => $request->input('keyword'), // Thêm từ khóa
        ];

        // Lấy thông tin sắp xếp từ request
        $orderBy = $request->input('order_by', 'created_at'); // Mặc định sắp xếp theo ngày đăng
        $order = $request->input('order', 'DESC'); // Mặc định là giảm dần

        // Lấy danh sách bất động sản với bộ lọc, phân trang, và sắp xếp
        $properties = $this->propertyService->searchProperties($filters, $perPage, $orderBy, $order);


        // Lấy danh sách dự án và loại hình bất động sản để đổ select box
        $propertyTypes = $this->propertyTypeService->getAllPropertyTypes();
        $projects = $this->projectService->getAllProjects();

        return view('client.property.index', compact('properties', 'propertyTypes', 'projects'))
            ->with('properties', $properties->appends($request->all()));
    }


    public function detail($id)
    {
        // Lấy bất động sản theo id
        $property = $this->propertyService->getPropertyById($id);

        // Lấy danh sách các bất động sản liên quan cùng dự án
        $filters = ['project_id' => $property->project_id]; // lọc theo cùng dự án
        $properties = $this->propertyService->searchProperties($filters, 12, 'created_at', 'DESC');

        return view('client.property.detail', compact('property', 'properties'));
    }
}
