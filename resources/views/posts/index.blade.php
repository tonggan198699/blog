@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
              @forelse($posts as $post)
                <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4>
                        <a href="{{ $post->path() }}">
                            {{ $post->title }}
                        </a>
                      </h4>
                    </div>

                    <div class="panel-body">
                            <article>
                                <div class="body">{{$post->content}}</div>
                            </article>

                            <div class="pull-right">Created at {{ $post->created_at->diffForHumans() }}</div>
                            <hr>
                    </div>
                </div>
              @empty
                <p class="text-center">There are no posts yet, you can <a href="{{ route('posts.create') }}">create</a> post here.</p>
              @endforelse
                  <span class="pull-right"> {{ $posts->links() }} </span>
            </div>
        </div>
    </div>
@endsection
