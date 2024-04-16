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
            $blogs = Blog::with('user')->paginate(3);
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
        return view('blog.create-blog',['header'=>'Create Blog']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|min:3|max:15",
            "description" => "required|min:3|max:30",
            "content" => "required|min:10|max:1000",
        ]);

        try {
            $blog = new Blog();

            $blog->title = $request->input('title');
            $blog->description = $request->input('description');
            $blog->content = $request->input('content');
            $blog->user_id = auth()->user()->id;

            $blog->save();

            return response()->json(['success'=>'OK'], 200);
            
        } catch (\Exception $e) {
            return response()->json(['error'=>$e->getMessage()], 400);
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
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog.edit-blog', ['blog'=>$blog,'header'=>'Edit Blog']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "title" => "required|min:3|max:15",
            "description" => "required|min:3|max:30",
            "content" => "required|min:10|max:1000",
        ]);

        try {
            $blog = Blog::findOrFail($id);

            $blog->title = $request->input('title');
            $blog->description = $request->input('description');
            $blog->content = $request->input('content');

            $blog->save();

            return response()->json(['success'=>'OK'], 200);
            //return redirect('/dashboard');
            
        } catch (\Exception $e) {
            return response()->json(['error'=>$e->getMessage()], 400);
          // return $e->getMessage();
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
