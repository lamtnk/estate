<?php

namespace App\Service\client;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectService
{
    public function getAllProjects()
    {
        // Lấy tất cả các dự án với các trường cần thiết
        return Project::all(); // Lấy toàn bộ dữ liệu từ bảng projects
    }

    public function getProjectsByPaginate($perPage)
    {
        // Lấy dữ liệu với phân trang
        return Project::with(['images', 'primaryImage'])->paginate($perPage);
    }

    public function storeProject($data)
    {
        Project::create($data);
    }

    /**
     * Lấy dự án theo ID.
     *
     * @param int $id
     * @return Project
     */
    public function getProjectById($id)
    {
        return Project::findOrFail($id);
    }

    /**
     * Cập nhật thông tin dự án.
     *
     * @param int $id
     * @param array $data
     * @return Project
     */
    public function updateProject($id, array $data)
    {
        $project = $this->getProjectById($id);  // Lấy dự án theo ID
        $project->update($data);  // Cập nhật thông tin dự án
        return $project;
    }
}
