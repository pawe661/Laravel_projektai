@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Post</h1>

        <form method="POST" action="{{route('post.update', [$post])}}" >
            <input class="form-control" type='text' name="post_title" value="{{$post->title}}" placeholder="post title"/>
            <input class="form-control" type='text' name="post_excerpt" value="{{$post->excerpt}}" placeholder="post excerpt"/>
            <input class="form-control" type='text' name="post_description" value="{{$post->description}}" placeholder="post description"/>
            <input class="form-control" type='text' name="post_author" value="{{$post->author}}" placeholder="post author"/>
            
            
                <select class="form-control" name="post_category_id" placeholder="post category">
                    @foreach ($categories as $category)
                        @if ($category->id == $post->category_id)
                        <option value="{{$category -> id}}" selected>{{$category->title}}</option>
                        @else 
                        <option value="{{$category -> id}}" >{{$category->title}}</option>
                        @endif
                    @endforeach
                </select>
                @csrf
            <button class="btn btn-primary" type='submit'>Add</button>
            <a class="btn btn-secondary" href="{{ url()->previous() }}">Back</a>
        </form>

    </div>
    @endsection