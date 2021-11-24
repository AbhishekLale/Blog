@extends('layouts.app')

@section('content')


<div class="container">
    <h2>My Posts</h2>
    <div class="mt-2">
        @foreach($posts as $post)
        <div class="card text-white bg-dark mb-3 mt-3">
            <div class="card-body">
            <a href=" {{ route('post.single',[$post->id]) }}">
                <h5 class="card-title">{{ $post->title }}</h5>
            </a>
                <p class="card-text">{{ $post->description }}</p>
            </div>
            <a href=" {{ route('post.edit', [$post->id]) }} "><button type="button" class="btn btn-success">edit</button></a>
            <a href=" {{ route('post.delete', [$post->id]) }} " class="mt-2"><button type="button" class="btn btn-danger">Delete</button></a>
        </div>
        @endforeach
    </div>

</div>



@endsection