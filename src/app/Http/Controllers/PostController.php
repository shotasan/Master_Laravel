<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPost;
use App\Http\Requests\StorePost;

class PostController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    dd(BlogPost::all());
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    dd(BlogPost::find($id));
  }

  public function create()
  {
    return view('posts.create');
  }

  public function store(StorePost $request)
  {
    dd('hoge');
    $validatedData = $request->validated();
    dd($validatedData);
    $blogPost = new BlogPost();
    $blogPost->title = $request->input('title');
    $blogPost->content = $request->input('content');
    $blogPost->save();

    $request->session()->flash('status', 'Blog post was created!');

    return redirect()->route('posts.show', ['post' => $blogPost->id]);
  }
}
