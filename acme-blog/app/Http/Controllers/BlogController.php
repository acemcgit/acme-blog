<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $blogs = Blog::with('user')->paginate(10);
            return view('dashboard',['blogs'=>$blogs,'user_id'=>auth()->user()->id]);
        } catch (\Exception $e) {
            return $e->getMessage();
         }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create-blog');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "description" => "required",
            "content" => "required",
        ]);

        try {
            $blog = new Blog();

            $blog->title = $request->input('title');
            $blog->description = $request->input('description');
            $blog->content = $request->input('content');
            $blog->user_id = auth()->user()->id;

            $blog->save();

            return redirect('/dashboard');
            
        } catch (\Exception $e) {
           return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "title" => "required",
            "description" => "required",
            "content" => "required",
        ]);

        try {
            $blog = Blog::find($id);

            $blog->title = $request->input('title');
            $blog->description = $request->input('description');
            $blog->content = $request->input('content');

            $blog->save();

            return redirect('/dashboard');
            
        } catch (\Exception $e) {
           return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $blog = Blog::find($id);
            if ($blog) {
                $blog->delete();
                return redirect('/dashboard');
            }
        } catch (\Exception $e) {
           return $e->getMessage();
        }

        
    }
}
