<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Filters\PostFilters;
use Illuminate\Http\Request;

class PostController extends Controller
{
     protected $postPerPage = 5;

     protected $filters = ['by'];

     public function __construct()
     {
       $this->middleware('auth')->except(['index', 'show']);
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostFilters $filters)
    {
      $posts = $this->getPosts($filters);

      return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'title' => 'required',
          'content' => 'required'
        ]);

        $post = Post::create([
          'user_id' => auth()->id(),
          'title' => request('title'),
          'content' => request('content')
        ]);

        $post->save();
        return redirect($post->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      $this->authorize('update', $post);
      $requestData = $this->validate($request, [
        'title' => 'required',
        'content' => 'required'
      ]);

      $post->update($requestData);

      return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, Request $request)
    {
      $this->authorize('update', $post);
      $post->replies()->delete();
      $post->delete();

      return redirect('/posts');

    }

    /**
   * @param PostFilters $filters
   * @return mixed
   */
    protected function getPosts(PostFilters $filters)
    {
      $posts = Post::latest()->filter($filters);

      $posts = $posts->paginate($this->postPerPage);
      return $posts;
    }

}
