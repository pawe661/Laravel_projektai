@extends('layouts.app')

@section('content')

    <div class="container">
    <h1>Post Show</h1>

    <h2> Post Title : {{$post->title}}</h2>
        <p>Id : {{$post->id}}</p>
        <p>Post Excerpt : {{$post->excerpt}}</p>
        <p>Post Description : {{$post->description}}</p>
        <p>Post Author : {{$post->author}}</p>
        
        <p>Post Category : {{$post -> postCategory -> title}}</p>

   
        <form method="post" action="{{route('post.destroy', [$post])}}">
            @csrf
            <button class="btn btn-danger" type="submit">Delete post</button>
        </form>
        <a class="btn btn-secondary" href="{{ url()->previous() }}">Back</a>



    </div>
    @endsection