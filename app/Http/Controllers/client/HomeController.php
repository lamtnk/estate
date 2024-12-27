<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class HomeController extends Controller
{

    public function index()
    {
        $topProperties = Property::with('primaryImage')->take(8)->get();
        return view('client.home.index', compact('topProperties'));
    }
}
