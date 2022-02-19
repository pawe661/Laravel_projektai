@extends('layouts.app')

@section('content')

    @if (session()->has('error_message'))
        <div class="alert alert-danger">
            {{session()->get('error_message')}}
        </div>   
    @endif

    @if (session()->has('success_message'))
        <div class="alert alert-success">
            {{session()->get('success_message')}}
        </div>   
    @endif

    <div class="container">
    <h1>posts Index</h1>

    @if (count($posts) == 0)
    <p>There are no posts</p>
    @endif
  
    <a class="btn btn-primary" href="{{route('post.create')}}">Create new Post</a>
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Post Title</th>
            <th>Post Excerpt</th>
            <th>Post Description</th>
            <th>Post Author</th>
            <th>Post Category</th>
            <th>Actions</th>
        </tr>
        
        @foreach ($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->excerpt}}</td>
            <td>{{$post->description}}</td>
            <td>{{$post->author}}</td>
            
            <td>{{$post->postCategory->title}}</td>

            <td>
                <a class="btn btn-primary" href="{{route('post.edit', [$post])}}">Edit</a>
                <a class="btn btn-secondary" href="{{route('post.show', [$post])}}">Show</a>

                <form method="post" action="{{route('post.destroy', [$post])}}">
                    @csrf
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
    <a class="btn btn-secondary" href="{{route('nav')}}">Back to nav</a>

    </div>
    @endsection