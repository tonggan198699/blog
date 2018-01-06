@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Edit Existing Post</div>
            <div class="panel-body">
              <form method="post" action="{{ route('posts.update', $post->id) }}">
                  {{ csrf_field() }}
                  {{ method_field('patch') }}

                  <div class="form-group">
                      <label for="title">Post Title:</label>
                      <input type="text" class="form-control" id="title" name="title"
                             value="{{ old('title') }}" required>
                  </div>

                  <div class="form-group">
                      <label for="content">Post Content:</label>
                        <textarea name="content" class="form-control" id="content" rows="8" required>
                          {{ old('content') }}</textarea>
                  </div>


                    <button type="submit" class="btn btn-primary">Update</button>
              </form>
            </div>

                  @if(count($errors))
                    <ul class="alert alert-danger">
                      @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  @endif


        </div>
      </div>
    </div>
</div>
@endsection
