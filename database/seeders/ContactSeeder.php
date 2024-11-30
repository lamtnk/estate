<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    public function run()
    {
        // Tạo 5 liên hệ giả
        Contact::create([
            'name' => 'Nguyễn Văn A',
            'email' => 'nguyenvana@example.com',
            'phone' => '0123456789',
            'message' => 'Xin chào, tôi muốn biết thêm thông tin về dự án.',
        ]);

        Contact::create([
            'name' => 'Trần Thị B',
            'email' => 'tranthib@example.com',
            'phone' => '0123456790',
            'message' => 'Tôi muốn nhận thông tin về các bất động sản.',
        ]);

        // Tạo thêm 3 liên hệ khác
        Contact::factory()->count(3)->create();
    }
}
