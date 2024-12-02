<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service\admin\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
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
        ]);

        // Nếu validate thành công, gọi đến service để lưu dự án
        try {
            $this->projectService->storeProject($validatedData);
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
        ]);

        // Cập nhật dự án thông qua ProjectService
        try {
            $this->projectService->updateProject($id, $validatedData);
        } catch (\Exception $e) {
            // Nếu có lỗi khi lưu, quay lại form và hiển thị thông báo lỗi
            return redirect()->back()->with('error', 'Lỗi trong quá trình lưu dự án!');
        }

        // Redirect về trang danh sách với thông báo thành công
        return redirect()->route('admin.project.index')->with('success', 'Dự án đã được cập nhật thành công!');
    }
}
