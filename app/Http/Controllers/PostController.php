<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cloudinary; 
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function posts(Post $post)
    {
        return view('posts.posts')->with(['posts' => $post->getPaginateByLimit()]); 
    }
    
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }
   
    public function create()
    {
    return view('posts.create');
    }

    public function store(PostRequest $request, Post $post)
    {   
        $input = $request['post'];
        if($request->file('image')){
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input += ['image_url' => $image_url];
        }
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {   
        $input_post = $request['post'];
        if($request->file('image')){
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input_post += ['image_url' => $image_url];
        }
        $post->fill($input_post)->save();
    
        return redirect('/posts/' . $post->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}