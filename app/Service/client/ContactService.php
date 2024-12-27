<?php

namespace App\Service\client;

use App\Models\Contact;
use App\Models\Project;
use Illuminate\Http\Request;

class ContactService
{
    public function storeContact($name, $email, $phone, $message)
    {
        return Contact::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'message' => $message,
        ]);
    }
}
