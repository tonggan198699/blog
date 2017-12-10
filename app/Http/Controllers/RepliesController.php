<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class RepliesController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function store(Post $post)
    {
      $post->addReply([
          'content' => request('content'),
          'user_id' => auth()->id()
      ]);

      return back();
    }



}
