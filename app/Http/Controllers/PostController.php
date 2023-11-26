<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function dashboard()
     {
         $posts= DB::table('posts')->orderBy('id', 'desc')->get();
     return view('index' ,compact('posts'));
     }


    public function index()
    {
        $posts=Post::all();
    return view('posts.posts' ,compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts=Post::all();
        $categories=Category::all();
        $tags=Tag::all();
        return view('posts.create' ,compact('posts' ,'tags' ,'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $dataval=$request->validate([
            'title'=>'required|string|max:5000',
            'content'=>'required|string|max:5000',
            'category_id'=>'required|string|max:5000',
            'tag_id'=>'required|string|max:5000',
            'image'=>'required|image|mimes:png,jpg|max:255',
        ]);
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $n = $file->getClientOriginalName();
            $ex = time() . '.' . $n;
            $file->move('posts/images/', $ex);
            $path=$ex;
        };
        
        Post::create([
        'title'=>$request->title,
        'content'=>$request->content,
        'category_id'=>$request->category_id,
        'tag_id'=>$request->tag_id,
         'image'=>$path,
        ]);

return redirect()->back();


    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories=Category::all();
        $tags=Tag::all();
        $post=Post::where('id' ,$id)->first();
        return view ('posts.edit' ,compact('post' ,'categories' ,'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $image=$request->file('image')->getClientOriginalName();
        $path=$request->file('image')->storeAs('posts' ,$image);

       Post:: where('id' ,$id)->update([
       'title'=>$request->title,
       'content'=>$request->content,
       'category_id'=>$request->category_id,
       'tag_id'=>$request->tag_id,
        'image'=>$path,
       ]);

return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Post::where('id' ,$id)->delete();
        return redirect()->back();
    }
    public function link($id)
    {
       $post= Post::where('id' ,$id)->first();
        return view('blog-single' ,compact('post'));
    }
}
