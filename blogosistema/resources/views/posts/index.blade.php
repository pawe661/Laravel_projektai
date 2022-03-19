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

    <form method="GET" action="{{route('post.index')}}">
        @csrf
        Filter by 
        <select name="category_id">
            <option value="all">All</option>
            @foreach ($categories as $category)
                @if ($category->id == $category_id)
                    <option value="{{$category->id}}" selected>{{$category->title}} </option>
                @else
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endif    
            @endforeach
        </select>
        <br >

        <button class="btn btn-secondary" type="submit">Sort</button>
    </form>
    <a href="{{route('post.index')}}" class="btn btn-primary">Clear filter</a>   

    <a class="btn btn-primary" href="{{route('post.create')}}">Create new Post</a>
    <a class="btn btn-primary" href="{{route('post.masscreate')}}">Create new Post with new Category</a>
    <table class="table table-striped">
        <tr>
            <th>@sortablelink('id', 'ID')</th>
            <th>@sortablelink ('title', 'Post Title')</th>
            <th>@sortablelink('excerpt', 'Category Excerpt')</th>
            <th>@sortablelink('description', 'Post Description')</th>
            <th>@sortablelink('author', 'Post Author')</th>
            <th>@sortablelink('postCategory.title', 'Post Category')</th>
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
    {!! $posts->appends(Request::except('page'))->render() !!}
    <a class="btn btn-secondary" href="{{route('nav')}}">Back to nav</a>

    </div>
    @endsection