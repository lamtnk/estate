<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service\admin\NewsService;
use App\Service\admin\ProjectService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $newsService;
    private $projectService;
    public function __construct(NewsService $newsService, ProjectService $projectService)
    {
        $this->newsService = $newsService;
        $this->projectService = $projectService;
    }
    public function index()
    {
        $news = $this->newsService->getAll();
        return view('admin.news.news', compact('news'));
    }
    public function showAddNew()
    {
        $projects = $this->projectService->getAllProjects();
        return view('admin.news.add', compact('projects'));
    }

    public function addNew(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required',
            'published_at' => 'required|date',
            'content' => 'required',
            'project_id' => 'required|integer|exists:projects,id',
        ]);
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('assets/images/thumb'), $imageName);
        } else {
            // Xử lý trường hợp không có tệp tải lên
            return back()->withErrors(['image' => 'Image upload failed.']);
        }
        $this->newsService->storeNews(
            $request->title,
            $request->content,
            1,
            $request->published_at,
            $imageName,
            $request->project_id
        );
        return redirect()->route('admin.news.index')->with('success', 'Thêm tin tức thành công');
    }

    public function showEditNew(Request $request)
    {
        $new = $this->newsService->getNewsById($request->id);
        $projects = $this->projectService->getAllProjects();
        return view('admin.news.edit', compact('new', 'projects'));
    }

    public function editNew(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'published_at' => 'required|date',
            'content' => 'required',
            'project_id' => 'required|integer|exists:projects,id',
        ]);
        
        $imageName = null;
        if ($request->image) {
            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('assets/images/thumb'), $imageName);
            $oldImagePath = $this->newsService->getNewsById($request->id)->image;
            if (file_exists(public_path('assets/images/thumb') . '/' . $oldImagePath) && $oldImagePath != null) {
                unlink(public_path('assets/images/thumb') . '/' . $oldImagePath);
            }
        }
        $this->newsService->updateNews($request->id, $request->title, $request->content, $request->author_id, $request->published_at, $imageName, $request->project_id);
        return redirect()->route('admin.news.index')->with('success', 'Sửa tin tức thành công');
    } 
    public function deleteNew(Request $request)
    {
        $this->newsService->deleteNews($request->id);
        return redirect()->route('admin.news.index')->with('success', 'Xóa tin tức thành công');
    }  
}
