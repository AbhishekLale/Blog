@extends('layouts.app')

@section('content')

<div class="container">
    <h2>My Posts</h2>
    <div class="mt-2">
        
        <single-post :post="{{ json_encode($post) }}" :author="{{ json_encode($post->user->name) }}"></single-post>

    </div>
    <form action="{{ route('comment.store', [$post->id]) }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="comment">comment</label>
          <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-dark">comment</button>
    </form>
    <hr>
    <h5>Comments :{{ $post->comments->count() }}</h5>
    <ul class="list-group">
    @foreach  ($post->comments as $comment )
        <li class="list-group-item">{{$comment->body }}<br> <small>{{$comment->user->name}}</small></li>
    @endforeach
    </ul>
</div> 

@endsection