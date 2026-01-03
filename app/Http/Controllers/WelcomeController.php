<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function categories()
    {
        $categories = DB::table('categories')->orderBy('name', 'asc')->get();
        return view('categories', compact('categories'));
    }

    public function featuredPost()
    {
        return view('featured-posts');
    }

    public function latest()
    {
        return view('blog');
    }
    public function archive()
    {
        return view('archive');
    }
    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }
}
