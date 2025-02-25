<?php

namespace App\Http\Controllers\Front;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $teams = Team::latest()->paginate(6);
        return view('front.about.index', compact('teams'));
    }
}
