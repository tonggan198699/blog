@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">Create a New Post</div>

              <div class="panel-body">
                  <form method="POST" action="/posts">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="title">Post Title:</label>
                          <input name="title" class="form-control" id="title">
                    </div>

                    <div class="form-group">
                        <label for="content">Post Content:</label>
                          <textarea name="content" class="form-control" id="content" rows="8"></textarea>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Publish</button>
                    </div>

                    @if(count($errors))
                      <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    @endif

                  </form>
              </div>

          </div>
        </div>
      </div>
  </div>
@endsection
