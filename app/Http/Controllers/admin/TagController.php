<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service\admin\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    private $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    /**
     * Hiển thị danh sách thẻ.
     */
    public function index()
    {
        $tags = $this->tagService->getAllTagsWithStatusSorted();
        return view('admin.tag.index', compact('tags'));
    }

    /**
     * Hiển thị form thêm thẻ.
     */
    public function add()
    {
        return view('admin.tag.add');
    }

    /**
     * Xử lý lưu thẻ mới.
     */
    public function store(Request $request)
    {
        // Validate dữ liệu
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:tags,name',
        ]);

        try {
            // Lưu thẻ thông qua service
            $this->tagService->storeTag($validatedData);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Lỗi trong quá trình lưu thẻ!');
        }

        return redirect()->route('admin.tag.index')->with('success', 'Thẻ đã được thêm thành công!');
    }

    /**
     * Hiển thị form sửa thẻ.
     */
    public function edit($id)
    {
        $tag = $this->tagService->getTagById($id);
        return view('admin.tag.edit', compact('tag'));
    }

    /**
     * Xử lý cập nhật thẻ.
     */
    public function update(Request $request, $id)
    {
        // Validate dữ liệu
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:tags,name,' . $id,
        ]);

        try {
            // Cập nhật thẻ thông qua service
            $this->tagService->updateTag($id, $validatedData);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Lỗi trong quá trình cập nhật thẻ!');
        }

        return redirect()->route('admin.tag.index')->with('success', 'Thẻ đã được cập nhật thành công!');
    }

    /**
     * Xóa thẻ.
     */
    public function destroy($id)
    {
        try {
            $this->tagService->softDeleteTag($id);
            return redirect()->route('admin.tag.index')->with('success', 'Thẻ đã được ẩn thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Lỗi trong quá trình ẩn thẻ!');
        }
    }


    public function restore($id)
    {
        try {
            $this->tagService->restoreTag($id); // Gọi service để khôi phục
            return redirect()->route('admin.tag.index')->with('success', 'Thẻ đã được khôi phục thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Lỗi trong quá trình khôi phục thẻ!');
        }
    }
}
