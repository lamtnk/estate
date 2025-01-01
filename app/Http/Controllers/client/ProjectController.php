<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Service\client\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index(Request $request)
    {
        // Lấy số lượng bất động sản mỗi trang từ query string (mặc định là 12)
        $perPage = $request->input('per_page', 12);

        // Lấy danh sách bất động sản với bộ lọc, phân trang, và sắp xếp
        $projects = $this->projectService->getProjectsByPaginate($perPage);

        return view('client.project.index', compact('projects'))
            ->with('projects', $projects->appends($request->all()));
    }

    public function detail($id)
    {
        $project = $this->projectService->getProjectById($id);
        return view('client.project.detail', compact('project'));
    }
}
