<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest;
use App\Category;

class PostController extends Controller
{
    public function index(Post $post)
    {
    //dd($post->get());
        return view('index')->with(['posts' => $post->getPagenateByLimit()]);
    }
    public function show(Post $post)
    {
        //dd(Post::find($id));
        return view('show')->with(['post'=> $post]);
    }
    public function create(Category $category){
        return view('create')->with(['categories' => $category->get()]);
    }
    public function store(Post $post, PostRequest $request)
    {
        //dd($request ->all());
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    public function edit(Post $post){
        return view('edit')->with(['post' => $post]);
    }
        
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();

        return redirect('/posts/' . $post->id);
    }
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
}
