<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service\admin\ProjectImageService;
use App\Service\admin\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $projectService;
    private $projectImageService;

    public function __construct(ProjectService $projectService, ProjectImageService $projectImageService)
    {
        $this->projectService = $projectService;
        $this->projectImageService = $projectImageService;
    }

    public function index()
    {
        $projects = $this->projectService->getAllProjects();
        return view('admin.project.index', compact('projects'));
    }

    public function add()
    {
        return view('admin.project.add');
    }

    public function store(Request $request)
    {
        // Validate dữ liệu
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'handover_date' => 'nullable|date',
            'status' => 'required|in:ongoing,completed',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'required',
        ]);

        // Lấy tệp ảnh từ request
        $image = $request->file('image');  // Đây là đối tượng UploadedFile

        // Nếu validate thành công, gọi đến service để lưu dự án
        try {
            $project = $this->projectService->storeProject($validatedData);
            $this->projectImageService->storeImage($project->id, $image, true);
        } catch (\Exception $e) {
            // Nếu có lỗi khi lưu, quay lại form và hiển thị thông báo lỗi
            return redirect()->back()->with('error', 'Lỗi trong quá trình lưu dự án!');
        }

        // Chuyển hướng về danh sách dự án với thông báo thành công
        return redirect()->route('admin.project.index')->with('success', 'Dự án đã được thêm thành công!');
    }

    public function edit($id)
    {
        $project = $this->projectService->getProjectById($id); // Gọi service để lấy dự án
        return view('admin.project.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        // Validate dữ liệu
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'handover_date' => 'nullable|date',
            'status' => 'required|in:ongoing,completed',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable',
        ]);

        // Lấy tệp ảnh từ request
        $image = $request->file('image');  // Đây là đối tượng UploadedFile

        // Cập nhật dự án thông qua ProjectService
        try {
            $this->projectService->updateProject($id, $validatedData);
            $this->projectImageService->changePrimaryImage($id, $image, true);
        } catch (\Exception $e) {
            // Nếu có lỗi khi lưu, quay lại form và hiển thị thông báo lỗi
            return redirect()->back()->with('error', 'Lỗi trong quá trình lưu dự án!');
        }

        // Redirect về trang danh sách với thông báo thành công
        return redirect()->route('admin.project.index')->with('success', 'Dự án đã được cập nhật thành công!');
    }
}
