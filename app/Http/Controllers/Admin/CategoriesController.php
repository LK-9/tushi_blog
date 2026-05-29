<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Post;
use Illuminate\Contracts\View\View;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function blog(): View
    {
        $posts = Post::with('category', 'user')->latest()->get();
        return view('admin.blog', compact('posts'));
    }
    public function blogcategories(): View
    {
        $categories = Categories::orderBy('name', 'asc')->get();
        return view('admin.blog-categories', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'status' => 'required|string'
        ]);

        Categories::create([
            'name' => $request->category_name,
            'status' => $request->status
        ]);

        return back()->with('success', 'category created successfully');
    }

    public function update(Request $request, $id)
    {
        $categories = Categories::find($id);
        $categories->update([
            'name' => $request->category_name,
            'status' => $request->status,
        ]);

        return back()->with('success', 'category updated successfully');
    }

    public function destroy($id)
    {
        $categories = Categories::find($id);
        $categories->delete();

        return back()->with('success', 'category deleted successfully');
    }
}
