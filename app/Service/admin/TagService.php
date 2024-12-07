<?php

namespace App\Service\admin;

use App\Models\Tag;

class TagService
{
    /**
     * Lấy tất cả thẻ.
     */
    public function getAllTags()
    {
        return Tag::all();
    }

    /**
     * Lấy tất cả thẻ.
     */
    public function getAllActiveTags()
    {
        return Tag::where('status', 1)->get();
    }

    public function getAllTagsWithStatusSorted()
    {
        return Tag::orderBy('status', 'desc')->orderBy('name', 'asc')->get();
    }


    /**
     * Lấy thông tin một thẻ theo ID.
     */
    public function getTagById($id)
    {
        return Tag::findOrFail($id);
    }

    /**
     * Lưu thẻ mới.
     */
    public function storeTag(array $data)
    {
        return Tag::create($data);
    }

    /**
     * Cập nhật thông tin thẻ.
     */
    public function updateTag($id, array $data)
    {
        $tag = $this->getTagById($id);
        $tag->update($data);
        return $tag;
    }

    /**
     * Xóa thẻ.
     */
    public function deleteTag($id)
    {
        $tag = $this->getTagById($id);
        $tag->delete();
    }

    public function softDeleteTag($id)
    {
        $tag = $this->getTagById($id);
        $tag->update(['status' => 0]);
    }

    /**
     * Khôi phục thẻ bằng cách cập nhật status = 1.
     */
    public function restoreTag($id)
    {
        $tag = $this->getTagById($id);
        $tag->update(['status' => 1]);
    }
}
