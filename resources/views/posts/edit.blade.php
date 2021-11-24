@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Edit Post</h3>
    
    <form action="{{ route('post.update', [$post->id]) }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" id="title" aria-describedby="title" placeholder="" value="{{$post->title}}">
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" name="description" id="description" rows="3">{{$post->description}}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Edit Post</button>
    </form>
</div>
@endsection