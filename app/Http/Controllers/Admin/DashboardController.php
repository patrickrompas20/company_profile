<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Team;
use App\Models\User;
use App\Models\Slider;
use App\Models\Project;
use App\Models\Service;
use App\Models\Category;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $postsCount = Post::count();
        $categoriesCount = Category::count();
        $servicesCount = Service::count();
        $projectsCount = Project::count();
        $teamsCount = Team::count();
        $slidersCount = Slider::count();
        $testimonialsCount = Testimonial::count();
        $usersCount = User::count();

        return view('admin.dashboard.index', compact('postsCount', 'categoriesCount', 'servicesCount', 'projectsCount', 'teamsCount', 'slidersCount', 'testimonialsCount', 'usersCount'));
    }
}
