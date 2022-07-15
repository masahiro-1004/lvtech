<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

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
    public function create(){
        return view('create');
    }
    public function store(Post $post, Request $request)
    {
        //dd($request ->all());
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
}
