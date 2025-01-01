<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Service\client\ProjectService;
use App\Service\client\PropertyTypeService;

class HomeController extends Controller
{
    private $propertyTypeService;
    private $projectService;

    public function __construct(PropertyTypeService $propertyTypeService, ProjectService $projectService)
    {
        $this->propertyTypeService = $propertyTypeService;
        $this->projectService = $projectService;
    }

    public function index()
    {
        $topProperties = Property::with('primaryImage')->take(3)->get();

        $news = News::take(4)->get();
        // Lấy danh sách dự án và loại hình bất động sản để đổ select box
        $propertyTypes = $this->propertyTypeService->getAllPropertyTypes();
        $projects = $this->projectService->getAllProjects();

        return view('client.home.index', compact('topProperties', 'propertyTypes', 'projects', 'news'));
    }
}
