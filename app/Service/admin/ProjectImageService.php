<?php

namespace App\Service\admin;

use App\Models\ProjectImage;
use Illuminate\Http\Request;

class ProjectImageService
{
    public function getProjectImages($projectId)
    {
        // Lấy toàn bộ ảnh của dự án
        return ProjectImage::where('project_id', $projectId)->get();
    }

    public function getPrimaryImage($projectId)
    {
        return ProjectImage::where('project_id', $projectId)
            ->where('is_primary', true)
            ->first(); // Chỉ lấy ảnh chính đầu tiên
    }

    public function getImageById($id)
    {
        return ProjectImage::findOrFail($id);
    }

    public function storeImage($projectId, $image, $isPrimary)
    {
        // Tạo tên file duy nhất
        $fileName = uniqid() . '_' . $image->getClientOriginalName();

        // Chuyển file vào thư mục public/assets/images/project
        $image->move(public_path('assets/images/project'), $fileName);

        // Cập nhật đường dẫn ảnh
        $imagePath = 'assets/images/project/' . $fileName;

        // Tạo bản ghi trong bảng ProjectImage
        ProjectImage::create([
            'project_id' => $projectId,
            'image_path' => $imagePath,
            'is_primary' => $isPrimary,
        ]);
    }

    public function deleteImage($id)
    {
        // Lấy thông tin ảnh cần xóa
        $image = $this->getImageById($id);

        // Xóa file vật lý trên server
        $filePath = public_path($image->image_path);
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Xóa bản ghi trong database
        $image->delete();
    }

    public function deleteProjectImages($projectId)
    {
        $images = $this->getProjectImages($projectId);

        foreach ($images as $image) {
            // Xóa tệp vật lý
            $filePath = public_path($image->image_path);
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Xóa bản ghi trong db
            $image->delete();
        }
    }

    public function changePrimaryImage($projectId, $image, $isPrimary)
    {
        $oldPrimaryImage = $this->getPrimaryImage($projectId);

        // Nếu tải ảnh chính mới lên từ edit form thì sẽ thay ảnh chính
        if ($image != null) {
            // Nếu ảnh chính cũ có tồn tại thì đổi thành ảnh phụ
            if ($oldPrimaryImage != null) {
                $oldPrimaryImage->is_primary = false;
                $oldPrimaryImage->save();
            }

            // Lưu ảnh chính mới
            $this->storeImage($projectId, $image, $isPrimary);
        }
    }
}
