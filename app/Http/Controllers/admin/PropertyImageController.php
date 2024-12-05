<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service\admin\PropertyImageService;
use Illuminate\Http\Request;

class PropertyImageController extends Controller
{
    private $propertyImageService;

    public function __construct(PropertyImageService $propertyImageService)
    {
        $this->propertyImageService = $propertyImageService;
    }

    public function index($propertyId)
    {
        $images = $this->propertyImageService->getPropertyImages($propertyId);
        return view('admin.property.imageIndex', compact('images'));
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
            // dd($th);
            return redirect()->back()->with('error', 'Lỗi trong quá trình lưu ảnh');
        }

        // Chuyển hướng về danh sách ảnh với thông báo thành công
        return redirect()->route('admin.property.images.index', $propertyId)->with('success', 'Ảnh được thêm thành công!');
    }

    public function delete($id) {}

    public function deleteAll($propertyId) {}
}
