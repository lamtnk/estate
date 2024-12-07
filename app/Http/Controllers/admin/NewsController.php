<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service\admin\NewsService;
use App\Service\admin\ProjectService;
use App\Service\admin\TagService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $newsService;
    private $projectService;
    private $tagService;
    public function __construct(NewsService $newsService, ProjectService $projectService, TagService $tagService)
    {
        $this->newsService = $newsService;
        $this->projectService = $projectService;
        $this->tagService = $tagService;
    }
    public function index()
    {
        $news = $this->newsService->getAll();
        return view('admin.news.news', compact('news'));
    }
    public function showAddNew()
    {
        $projects = $this->projectService->getAllProjects();
        $tags = $this->tagService->getAllActiveTags();
        return view('admin.news.add', compact('projects', 'tags'));
    }

    public function addNew(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|max:2048', // Đảm bảo tệp là ảnh
            'published_at' => 'required|date',
            'content' => 'required',
            'project_id' => 'required|integer|exists:projects,id',
            'tags' => 'nullable|array', // Cho phép nhiều tag
            'tags.*' => 'exists:tags,id', // Đảm bảo các tag ID tồn tại
        ]);

        // Xử lý tải ảnh
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('assets/images/thumb'), $imageName);
        } else {
            // Xử lý trường hợp không có tệp tải lên
            return back()->withErrors(['image' => 'Image upload failed.']);
        }

        try {
            // Lưu bài viết thông qua NewsService
            $news = $this->newsService->storeNews(
                $request->title,
                $request->content,
                1, // ID của user đăng bài (sửa nếu cần)
                $request->published_at,
                $imageName,
                $request->project_id
            );

            // Gắn thẻ liên quan nếu có
            if (!empty($request->tags)) {
                $news->tags()->sync($request->tags); // Gắn thẻ vào bài viết
            }

            return redirect()->route('admin.news.index')->with('success', 'Thêm tin tức thành công');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Có lỗi xảy ra khi thêm tin tức: ' . $e->getMessage()]);
        }
    }


    public function showEditNew(Request $request)
    {
        $news = $this->newsService->getNewsById($request->id);
        $projects = $this->projectService->getAllProjects();
        $tags = $this->tagService->getAllActiveTags();
        return view('admin.news.edit', compact('news', 'projects', 'tags'));
    }

    public function editNew(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'id' => 'required|integer|exists:news,id',
            'title' => 'required|string|max:255',
            'published_at' => 'required|date',
            'content' => 'required',
            'project_id' => 'required|integer|exists:projects,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'image' => 'nullable|image|max:2048',
        ]);

        try {
            $imageName = null;

            // Xử lý ảnh nếu có
            if ($request->hasFile('image')) {
                $imageName = time() . '_' . $request->image->getClientOriginalName();
                $request->image->move(public_path('assets/images/thumb'), $imageName);

                // Xóa ảnh cũ nếu tồn tại
                $oldImagePath = $this->newsService->getNewsById($request->id)->image;
                if ($oldImagePath && file_exists(public_path('assets/images/thumb') . '/' . $oldImagePath)) {
                    unlink(public_path('assets/images/thumb') . '/' . $oldImagePath);
                }
            }

            // Gọi service để cập nhật bài viết
            $this->newsService->updateNews(
                $request->id,
                $request->title,
                $request->content,
                $request->author_id,
                $request->published_at,
                $imageName,
                $request->project_id,
                $request->tags ?? [] // Mặc định là mảng rỗng nếu không có thẻ
            );

            return redirect()->route('admin.news.index')->with('success', 'Sửa tin tức thành công');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
        }
    }

    public function deleteNew(Request $request)
    {
        $this->newsService->deleteNews($request->id);
        return redirect()->route('admin.news.index')->with('success', 'Xóa tin tức thành công');
    }
}
