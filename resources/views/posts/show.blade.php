@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$post->title}}</div>

                    <div class="panel-body">
                        {{$post->content}}
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
    </div>
@endsection
