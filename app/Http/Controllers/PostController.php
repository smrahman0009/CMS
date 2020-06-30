<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Tag;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('verifyCountCategories')->only(['create','store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create')->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $image = $request->image->store('posts');
        // echo "Hello";
        // exit;
        
        $post = Post::create(
            ['title' => $request->title,
            'content' => $request->content,
            'description' => $request->description,
            'published_at' => $request->published_at,
            'image' => $image,
            'category_id' => $request->category,
            'user_id' => auth()->user()->id,
            ]
        );
        
        if($request->tags){
            $post->tags()->attach($request->tags);
        }
        
        // dd($request->tags);
        // exit;
        session()->flash('success','Posts created successfully');

        return redirect(route('post.index'));
    }

    /**
     * Restore a trashed posts instorage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function restore($post_id)
    {
        Post::withTrashed()->find($post_id)->restore();
        session()->flash('success','Posts restored successfully');

        return redirect()->back();
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
    public function edit(Post $post)
    {
        return view('post.create')->with('post',$post)->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only(['title','content','description','published_at']);
        if($request->hasFile('image')){
            $image = $request->image->store('posts');
            $post->deleteImage();
            $data['image'] = $image;
        }

        $post->update($data);

        if($request->tags){
            $post->tags()->sunc($request->tags);
        }

        session()->flash('success','Post updatted successfully');

        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id',$id)->firstOrFail();

        if($post->trashed())
        {
            $post->deleteImage();
            $post->forceDelete();
        }
        else $post->delete();

        session()->flash('success','Posts deleted successfully');

        return redirect(route('post.index'));
    }

    /**
     *Return the trashed posts from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
       $trashed = Post::onlyTrashed()->get();

        return view('post.index')->withposts($trashed);
    }
}
