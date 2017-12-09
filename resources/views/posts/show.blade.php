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

        @foreach($post->replies as $reply)
            <div class="panel panel-default">

                <div class="panel-heading">
                    <strong>{{$reply->owner->name}}</strong> said {{$reply->created_at->diffForHumans()}}
                </div>

                <div class="panel-body">
                      {{ $reply->content }}
                </div>
            </div>
        @endforeach

    </div>
@endsection
