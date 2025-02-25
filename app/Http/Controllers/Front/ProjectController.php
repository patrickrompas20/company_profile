<?php

namespace App\Http\Controllers\Front;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(9);
        return view('front.project.index', compact('projects'));
    }
}
