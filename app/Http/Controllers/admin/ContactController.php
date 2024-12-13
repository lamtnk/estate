<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service\admin\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index()
    {
        $contacts = $this->contactService->getAllContacts();
        return view('admin.contact.index', compact('contacts'));
    }
}
