@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                      <a href="#">{{ $post->creator->name }}</a> posted:
                      {{ $post->title }}
                    </div>

                    <div class="panel-body">
                        {{ $post->content }}
                    </div>

                </div>
            </div>
        </div>

          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              @foreach($post->replies as $reply)
                @include('posts.reply')
              @endforeach
            </div>
          </div>

          @if(auth()->check())
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <form method="POST" action="{{ $post->path() . '/replies' }}">
                    <div class="form-group">
                      <textarea name="content" id="content" class="form-control" placeholder="Have something to say?" rows="5"></textarea>
                    </div>

                    <button type="submit" class="btn btn-default">Post</button>
                  </form>
                </div>
            </div>

        @else
        <p class="text-center">Please <a href="{{ route('login') }}"> Sign In</a> to have your say in the blog.</p>
        @endif




    </div>
@endsection
