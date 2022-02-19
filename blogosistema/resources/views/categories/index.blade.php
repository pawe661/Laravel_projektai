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
    <h1>Categpries Index</h1>

    @if (count($categories) == 0)
    <p>There are no Categories</p>
    @endif


    <a class="btn btn-primary" href="{{route('category.create')}}">Create new Category</a>
    <table class="table table-striped">
        <tr>
            <th>@sortablelink('id', 'ID')</th>
            <th>@sortablelink ('title', 'Category Title')</th>
            <th>@sortablelink('description', 'Category Description')</th>
            <th>@sortablelink('category_editor', 'Category Editor')</th>
            <th>@sortablelink('category_posts_count', 'Post Count')</th>
            <th>Actions</th>
           
        </tr>
        
        @foreach ($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->title}}</td>
            <td>{{$category->description}}</td>
            <td>{{$category->category_editor}}</td>

            

            <td>{{count($category->categoryPosts)}}</td>

            <td>
                <a class="btn btn-primary" href="{{route('category.edit', [$category])}}">Edit</a>
                <a class="btn btn-secondary" href="{{route('category.show', [$category])}}">Show</a>

                <form method="post" action="{{route('category.destroy', [$category])}}">
                    @csrf
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
    {!! $categories->appends(Request::except('page'))->render() !!}
    <a class="btn btn-secondary" href="{{route('nav')}}">Back to nav</a>


    </div>
@endsection