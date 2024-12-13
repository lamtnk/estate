<?php

namespace App\Service\admin;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactService
{
    public function getAllContacts()
    {
        // Lấy tất cả các liên hệ với các trường cần thiết
        return Contact::all(); // Lấy toàn bộ dữ liệu từ bảng Contacts
    }

    public function storeContact($data)
    {
        Contact::create($data);
    }

    /**
     * Lấy liên hệ theo ID.
     *
     * @param int $id
     * @return Contact
     */
    public function getContactById($id)
    {
        return Contact::findOrFail($id);
    }

    /**
     * Cập nhật thông tin liên hệ.
     *
     * @param int $id
     * @param array $data
     * @return Contact
     */
    public function updateContact($id, array $data)
    {
        $Contact = $this->getContactById($id);  // Lấy liên hệ theo ID
        $Contact->update($data);  // Cập nhật thông tin liên hệ
        return $Contact;
    }
}
