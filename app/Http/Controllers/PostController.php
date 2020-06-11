<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\CreatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
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
        return view('post.create');
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
        // dd($image);
        // exit;
        Post::create(
            ['title' => $request->title,
            'content' => $request->content,
            'description' => $request->description,
            'published_at' => $request->published_at,
            'image' => $image
            ]
        );
       
        session()->flash('success','Posts created successfully');

        return redirect(route('post.index'));
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
        //
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
        //
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
        {Storage::delete($post->image);
            $post->forceDelete();}
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
       $trashed = Post::withTrashed()->get();

        return view('post.index')->withposts($trashed);
    }
}
