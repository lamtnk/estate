<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service\admin\ProjectService;
use App\Service\admin\PropertyImageService;
use App\Service\admin\PropertyService;
use App\Service\admin\PropertyTypeService;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    private $propertyService;
    private $projectService;
    private $propertyTypeService;
    private $propertyImageService;

    public function __construct(PropertyService $propertyService, ProjectService $projectService, PropertyTypeService $propertyTypeService, PropertyImageService $propertyImageService)
    {
        $this->propertyService = $propertyService;
        $this->projectService = $projectService;
        $this->propertyTypeService = $propertyTypeService;
        $this->propertyImageService = $propertyImageService;
    }

    public function index()
    {
        $properties = $this->propertyService->getAllProperties();
        return view('admin.property.index', compact('properties'));
    }

    public function add()
    {
        $projects = $this->projectService->getAllProjects();
        $propertyTypes = $this->propertyTypeService->getAllPropertyTypes();
        return view('admin.property.add', compact('projects', 'propertyTypes'));
    }

    public function store(Request $request)
    {
        // Validate du lieu
        $validateData = $request->validate([
            'unit_code' => 'required',
            'project_id' => 'required',
            'type_id' => 'required',
            'name' => 'required',
            'area' => 'required',
            'frontage' => 'required',
            'floor_1_area' => 'required',
            'price' => 'required',
            'bedrooms' => 'required',
            'bathrooms' => 'required',
            'parking' => 'required',
            'description' => 'required',
            'content' => 'required',
            'status' => 'required',
            'image' => 'required',
        ]);

        // Lấy tệp ảnh từ request
        $image = $request->file('image');  // Đây là đối tượng UploadedFile

        // Neu Validate thanh cong thi goi den Service de luu bat dong san
        try {
            $property = $this->propertyService->storeProperty($validateData); // Lưu bất động sản
            $this->propertyImageService->storeImage($property->id, $image, true); // Lưu ảnh chính của bất động sản
        } catch (\Throwable $th) {
            // Neu co loi khi luu thi quay lai form va thong bao loi
            return redirect()->back()->with('error', 'Lỗi trong quá trình lưu bất động sản');
        }

        // Chuyển hướng về danh sách bất động sản với thông báo thành công
        return redirect()->route('admin.property.index')->with('success', 'Bất động sản được thêm thành công!');
    }

    public function edit($id)
    {
        $property = $this->propertyService->getPropertyById($id);
        $projects = $this->projectService->getAllProjects();
        $propertyTypes = $this->propertyTypeService->getAllPropertyTypes();
        return view('admin.property.edit', compact('property', 'projects', 'propertyTypes'));
    }

    public function update(Request $request, $id)
    {
        // Validate du lieu
        $validateData = $request->validate([
            'unit_code' => 'required',
            'project_id' => 'required',
            'type_id' => 'required',
            'name' => 'required',
            'area' => 'required',
            'frontage' => 'required',
            'floor_1_area' => 'required',
            'price' => 'required',
            'bedrooms' => 'required',
            'bathrooms' => 'required',
            'parking' => 'required',
            'description' => 'required',
            'content' => 'required',
            'status' => 'required',
        ]);

        // Neu Validate thanh cong thi goi den Service de luu bat dong san
        try {
            $this->propertyService->updateProperty($id, $validateData);
        } catch (\Throwable $th) {
            // Neu co loi khi sửa thi quay lai form va thong bao loi
            return redirect()->back()->with('error', 'Lỗi trong quá trình sửa bất động sản');
        }

        // Chuyển hướng về danh sách bất động sản với thông báo thành công
        return redirect()->route('admin.property.index')->with('success', 'Bất động sản được sửa thành công!');
    }

    public function forceDelete($id)
    {
        try {
            $this->propertyService->deleteProperty($id);
        } catch (\Throwable $th) {
            // Neu co loi khi xoa thi quay lai form va thong bao loi
            return redirect()->back()->with('error', 'Lỗi trong quá trình sửa bất động sản');
        }

        // Chuyển hướng về danh sách bất động sản với thông báo thành công
        return redirect()->route('admin.property.index')->with('success', 'Bất động sản được xóa thành công!');
    }
}
