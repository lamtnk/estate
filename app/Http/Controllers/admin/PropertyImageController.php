<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service\admin\PropertyImageService;
use App\Service\admin\PropertyService;
use Illuminate\Http\Request;

class PropertyImageController extends Controller
{
    private $propertyImageService;
    private $propertyService;

    public function __construct(PropertyImageService $propertyImageService, PropertyService $propertyService)
    {
        $this->propertyImageService = $propertyImageService;
        $this->propertyService = $propertyService;
    }

    public function index($propertyId)
    {
        $images = $this->propertyImageService->getPropertyImages($propertyId);
        $property = $this->propertyService->getPropertyById($propertyId);
        return view('admin.property.imageIndex', compact('images', 'property'));
    }

    public function store(Request $request, $propertyId)
    {
        // Validate dữ liệu
        $request->validate([
            'images' => 'required', // Yêu cầu danh sách ảnh
            'images.*' => 'required', // Định dạng file ảnh hợp lệ
        ]);

        // Lưu từng ảnh được upload
        try {
            foreach ($request->file('images') as $image) {
                $this->propertyImageService->storeImage($propertyId, $image, false);
            }
        } catch (\Throwable $th) {
            // Xử lý lỗi khi lưu ảnh
            return redirect()->back()->with('error', 'Lỗi trong quá trình lưu ảnh' . $th->getMessage());
        }

        // Chuyển hướng về danh sách ảnh với thông báo thành công
        return redirect()->route('admin.property.images.index', $propertyId)->with('success', 'Ảnh được thêm thành công!');
    }

    public function delete($propertyId, $id)
    {
        try {
            $this->propertyImageService->deleteImage($id);
        } catch (\Throwable $th) {
            // Nếu có lỗi thì quay trở lại và thông báo lỗi
            return redirect()->route('admin.property.images.index', $propertyId)->with('error', 'Đã xảy ra lỗi khi xóa tất cả ảnh.');
        }

        // Chuyển hướng về danh sách ảnh và thông báo thành công
        return redirect()->route('admin.property.images.index', $propertyId)->with('success', 'Tất cả ảnh đã được xóa thành công.');
    }

    public function deleteAll($propertyId)
    {
        try {
            $this->propertyImageService->deletePropertyImages($propertyId);
        } catch (\Throwable $th) {
            // Nếu có lỗi thì quay trở lại và thông báo lỗi
            return redirect()->route('admin.property.images.index', $propertyId)->with('error', 'Đã xảy ra lỗi khi xóa tất cả ảnh.');
        }

        // Chuyển hướng về danh sách ảnh và thông báo thành công
        return redirect()->route('admin.property.images.index', $propertyId)->with('success', 'Tất cả ảnh đã được xóa thành công.');
    }
}
