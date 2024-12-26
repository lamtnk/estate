<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service\admin\ProjectImageService;
use App\Service\admin\ProjectService;
use Illuminate\Http\Request;

class ProjectImageController extends Controller
{
    private $projectImageService;
    private $projectService;

    public function __construct(ProjectImageService $projectImageService, ProjectService $projectService)
    {
        $this->projectImageService = $projectImageService;
        $this->projectService = $projectService;
    }

    public function index($projectId)
    {
        $images = $this->projectImageService->getProjectImages($projectId);
        $project = $this->projectService->getProjectById($projectId);
        return view('admin.project.imageIndex', compact('images', 'project'));
    }

    public function store(Request $request, $projectId)
    {
        // Validate dữ liệu
        $request->validate([
            'images' => 'required', // Yêu cầu danh sách ảnh
            'images.*' => 'required', // Định dạng file ảnh hợp lệ
        ]);

        // Lưu từng ảnh được upload
        try {
            foreach ($request->file('images') as $image) {
                $this->projectImageService->storeImage($projectId, $image, false);
            }
        } catch (\Throwable $th) {
            // Xử lý lỗi khi lưu ảnh
            return redirect()->back()->with('error', 'Lỗi trong quá trình lưu ảnh');
        }

        // Chuyển hướng về danh sách ảnh với thông báo thành công
        return redirect()->route('admin.project.images.index', $projectId)->with('success', 'Ảnh được thêm thành công!');
    }

    public function delete($projectId, $id)
    {
        try {
            $this->projectImageService->deleteImage($id);
        } catch (\Throwable $th) {
            // Nếu có lỗi thì quay trở lại và thông báo lỗi
            return redirect()->route('admin.project.images.index', $projectId)->with('error', 'Đã xảy ra lỗi khi xóa tất cả ảnh.');
        }

        // Chuyển hướng về danh sách ảnh và thông báo thành công
        return redirect()->route('admin.project.images.index', $projectId)->with('success', 'Tất cả ảnh đã được xóa thành công.');
    }

    public function deleteAll($projectId)
    {
        try {
            $this->projectImageService->deleteProjectImages($projectId);
        } catch (\Throwable $th) {
            // Nếu có lỗi thì quay trở lại và thông báo lỗi
            return redirect()->route('admin.project.images.index', $projectId)->with('error', 'Đã xảy ra lỗi khi xóa tất cả ảnh.');
        }

        // Chuyển hướng về danh sách ảnh và thông báo thành công
        return redirect()->route('admin.project.images.index', $projectId)->with('success', 'Tất cả ảnh đã được xóa thành công.');
    }
}
