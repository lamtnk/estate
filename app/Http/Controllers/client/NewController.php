<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Service\admin\NewsService;
use App\Service\admin\PropertyService;
use App\Service\admin\TagService;

class NewController extends Controller
{
    private $newService;
    private $tagService;
    private $propertyService;
    public function __construct()
    {
        $this->newService = new NewsService();
        $this->tagService = new TagService();
        $this->propertyService = new PropertyService();
    }
    public function index()
    {
        $properties = $this->propertyService->getAllProperties();
        $tags = $this->tagService->getAllActiveTags();
        $news = $this->newService->getAll();
        return view('client.news.index', compact('news', 'tags', 'properties'));
    }

    public function show($id)
    {
        $new = $this->newService->getNewsById($id);
        $properties = $new->Project->Properties()->with('primaryImage')->get();
        return view('client.news.detail', compact('new', 'properties'));
    }
}
