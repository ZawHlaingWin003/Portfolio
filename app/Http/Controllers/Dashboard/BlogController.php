<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;


class BlogController extends Controller
{
    public function list()
    {
        $blogs = Blog::latest()->get();
        return view('dashboard.blogs.index', compact('blogs'));
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Blog::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function index(Request $request)
    {
        if ($request->search) {
            $blogs = Blog::where('title', 'like', '%'.$request->search.'%')
                    ->orWhere('content', 'like', '%'.$request->search.'%')->latest()->paginate(5);
        }
        elseif ($request->category) {
            $blogs = Category::where('name', $request->category)->firstOrFail()->blogs()->paginate(5);
        }
        elseif ($request->author) {
            $blogs = User::where('name', $request->author)->firstOrFail()->blogs()->paginate(5);
        }
        else {
            $blogs = Blog::latest()->paginate(7);
        }

        $allBlogs = Blog::latest()->paginate(7);
        $latestBlog = Blog::latest()->take(1)->get();

        $categories = Category::latest()->get();

        return view('frontend.pages.blogs-page', compact('blogs', 'allBlogs', 'latestBlog', 'categories', 'request'));
    }


    public function create()
    {
        $categories = Category::latest()->get();
        return view('dashboard.blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|alpha_dash|unique:blogs',
            'excerpt' => 'required',
            'content' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required'
        ]);

        $filename = time().'-'.$request->slug.'.'.$request->image_path->getClientOriginalExtension();
        $request->image_path->storeAs('images/blogs', $filename);

        Blog::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'image_path' => $filename,
            'author_id' => auth()->user()->id,
            'category_id' => $request->category_id
        ]);

        return back()->with('success', 'Blog Created Successfully');
    }

    public function show(Blog $blog)
    {
        $category = $blog->category;
        $relatedBlogs = $category->blogs()->where('id', '!=', $blog->id)->latest()->take(3)->get();
        return view('frontend.pages.blog-detail', compact('blog', 'relatedBlogs'));
    }

    public function edit(Blog $blog)
    {
        if(auth()->user()->id !== $blog->author->id) {
            abort(403);
        } else {
            $categories = Category::latest()->get();
            return view('dashboard.blogs.edit', compact('blog', 'categories'));
        }

    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|alpha_dash|unique:blogs,slug,'.$blog->id,
            'excerpt' => 'required',
            'content' => 'required',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required'
        ]);

        if(auth()->user()->id !== $blog->author->id) {
            abort(403);
        }else {

            if($request->file('image_path')) {
                $filename = time().'-'.$request->slug.'.'.$request->image_path->getClientOriginalExtension();
                $request->image_path->storeAs('images/blogs', $filename);
                $blog->image_path = $filename;
            }else {
                unset($request->image_path);
            }

            $blog->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'excerpt' => $request->excerpt,
                'content' => $request->content,
                'category_id' => $request->category_id
            ]);

            return redirect()->route('blogs.list')->with('success', 'Blog Updated Successfully');
        }

    }

    public function destroy(Blog $blog)
    {
        if(auth()->user()->id !== $blog->author->id){
            abort(403);
        }

        Storage::delete('frontend/images/blogs/'.$blog->image_path);
        $blog->delete();

        return back()->with('success', 'Blog Deleted Successfully!');
    }

}
