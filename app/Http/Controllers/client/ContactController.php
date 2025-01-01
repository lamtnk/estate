<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Service\client\ContactService;

class ContactController extends Controller
{
    protected $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index()
    {
        return view('client.contact.index');
    }

    public function send(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'content' => 'required|string',
        ]);

        // Lưu thông tin liên hệ qua Service
        $this->contactService->storeContact(
            $request->name,
            $request->email,
            $request->phone,
            $request->content
        );

        // Chuyển hướng hoặc gửi phản hồi
        return redirect()->back()->with('success', 'Cảm ơn bạn đã liên hệ!');
    }
}
