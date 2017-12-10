<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
      * @param Post $post
      * @return \Illuminate\Http\RedirectResponse
      */
    public function store(Post $post)
    {
      $this->validate(request(), ['content' => 'required']);

      $post->addReply([
          'content' => request('content'),
          'user_id' => auth()->id()
      ]);

      return back();
    }


}
