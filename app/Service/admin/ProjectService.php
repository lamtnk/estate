<?php

namespace App\Service\admin;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectService
{
    public function getAllProjects()
    {
        // Lấy tất cả các dự án với các trường cần thiết
        return Project::all(); // Lấy toàn bộ dữ liệu từ bảng projects
    }

    public function storeProject($data)
    {
        return Project::create($data);
    }

    /**
     * Lấy dự án theo ID.
     *
     * @param int $id
     * @return Project
     */
    public function getProjectById($id)
    {
        return Project::with('images', 'primaryImage')->findOrFail($id);
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
