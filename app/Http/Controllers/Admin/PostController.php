<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\user\Catagory;
use App\Model\user\Post;
use App\Model\user\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.show',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if (Auth::user()->can('posts.create')) {
        $tags = Tag::all();
        $categories = Catagory::all();
        return view('admin.post.post',compact('tags','categories'));
    }else{
      return redirect(route('admin.home'));
    }
  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[

            'title'     => 'required',
            'sub_title' => 'required',
            'slug'      => 'required',
            'body'      => 'required',
            'image'     =>  'required',
       ]);



       if ($request->hasFile('image')) {
         $imageName = $request->image->store('public');
       }
                   $post = new Post;
                   $post->image = $imageName;
                   $post->title = $request->title;
                   $post->sub_title = $request->sub_title;
                   $post->slug = $request->slug;
                   $post->body = $request->body;
                   $post->status = $request->status;
                   $post->save();
                   $post->tags()->sync($request->tags);
                   $post->categories()->sync($request->categories);
                   return redirect (route('post.index'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
      if (Auth::user()->can('posts.update')) {  
        $post = post::with('tags','categories')->find($id);
        $tags = Tag::all();
        $categories = Catagory::all();
        return view('admin.post.edit',compact('tags','categories','post'));
      }else{
        return redirect(route('admin.home'));
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        
        $this->validate($request,[

            'title'     => 'required',
            'sub_title' => 'required',
            'slug'      => 'required',
            'body'      => 'required',
            'image'     =>  'required',
            ]);

            if ($request->hasFile('image')) {
             $imageName = $request->image->store('public');
           }

               $post =  Post::find($id);
               $post->image = $imageName;
               $post->title = $request->title;
               $post->sub_title = $request->sub_title;
               $post->slug = $request->slug;
               $post->body = $request->body;
               $post->status = $request->status;
               $post->tags()->sync($request->tags);
               $post->categories()->sync($request->categories);
               $post->save();
               return redirect (route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Post::where('id',$id)->delete();
       return redirect()->back();
    }

    // for controll accessing without login

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
}
