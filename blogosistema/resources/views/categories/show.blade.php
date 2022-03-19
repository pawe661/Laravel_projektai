@extends('layouts.app')

@section('content')

    <div class="container">
    <h1>Categories Show</h1>
    <!-- <td>{{$category->id}}</td>
            <td>{{$category->title}}</td>
            <td>{{$category->description}}</td>
            <td>{{$category->category_editor}}</td>

            

            <td>{{count($category->categoryPosts)}}</td> -->
    <h2> Category Title : {{$category->title}}</h2>
        <p>Id : {{$category->id}}</p>
        <p>Category Description : {{$category->description}}</p>
        <p>Category Editor: {{$category->category_editor}}</p>

        @if(count($category -> categoryPosts) == 0) 
            <p>Category has no Posts </p>
        @else 
            <table class="table table-striped">
                <tr>
                    <th>Id</th>
                    <th>Post Title</th>
                    <th>Post Excerpt</th>
                    <th>Post Description</th>
                    <th>Post author</th>
                    <th>Actions</th>
                </tr>
                
            @foreach ($category->categoryPosts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->excerpt}}</td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->author}}</td>

                    <td>
                        <form method="post" action="{{route('post.destroy', [$post])}}">
                        @csrf
                            <button class="btn btn-danger" type="submit">Delete Post</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </table>
        @endif    
        <form method="post" action="{{route('category.destroy', [$category])}}">
            @csrf
            <button class="btn btn-danger" type="submit">Delete Category</button>
        </form>
        <a class="btn btn-secondary" href="{{ url()->previous() }}">Back</a>



    </div>
    @endsection