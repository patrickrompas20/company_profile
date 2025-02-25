<?php

namespace App\Http\Controllers\Front;

use Mail;
use App\Models\Fact;
use App\Models\Post;
use App\Models\Team;
use App\Models\Slider;
use App\Models\Project;
use App\Models\Service;
use App\Mail\ContactMail;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::latest()->get();
        $projects = Project::latest()->get();
        $testimonials = Testimonial::latest()->get();
        $facts = Fact::latest()->get();
        $posts = Post::latest()->get();
        $teams = Team::latest()->get();
        $sliders = Slider::latest()->get();
        return view('front.home.index', compact('posts', 'teams', 'sliders', 'testimonials', 'services', 'projects', 'facts'));
    }

}
