<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $latestBlogs = Blog::latest()->take(3)->get();
        $projects = Project::orderBy('id', 'desc')->get();
        return view('frontend.pages.app', compact('projects', 'latestBlogs'));
    }
}
