<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Service\client\ProjectService;
use App\Service\client\PropertyRequestService;
use App\Service\client\PropertyService;
use App\Service\client\PropertyTypeService;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    private $propertyService;
    private $propertyTypeService;
    private $projectService;
    private $propertyRequestService;

    public function __construct(PropertyService $propertyService, PropertyTypeService $propertyTypeService, ProjectService $projectService, PropertyRequestService $propertyRequestService)
    {
        $this->propertyService = $propertyService;
        $this->propertyTypeService = $propertyTypeService;
        $this->projectService = $projectService;
        $this->propertyRequestService = $propertyRequestService;
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
            'furniture' => $request->input('furniture'),
            'direction' => $request->input('direction'),
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

    public function submitPropertyRequest(Request $request)
    {
        $validateData = $request->validate([
            'property_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'nullable',
            'date' => 'required',
            'time' => 'required',
            'purpose' => 'required',
            'visit_type' => 'required',
            'request_type' => 'required',
            'status' => 'required',
        ]);

        // Nếu Validate thành công thì gọi đến Service để lưu thông tin liên hệ của khách hàng
        try {
            $this->propertyRequestService->storePropertyRequest($validateData);
        } catch (\Throwable $th) {
            // Nếu có lỗi khi gửi thông tin liên hệ thì quay lại form và thông báo lỗi
            return redirect()->back()->with('error', 'Lỗi trong quá trình gửi thông tin liên hệ');
        }

        // Chuyển hướng về danh sách bất động sản với thông báo thành công
        return redirect()->route('client.property.detail', $validateData['property_id'])->with('success', 'Thông tin liên hệ được gửi thành công!');
    }
}
