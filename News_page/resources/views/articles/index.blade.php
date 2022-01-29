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
    <h1>Articles Index</h1>

    @if (count($articles) == 0)
    <p>There are no Articles</p>
    @endif
  
    <a class="btn btn-primary" href="{{route('article.create')}}">Create new Article</a>
    <table class="table table-striped">
        <tr>
        <!-- $article->title = $request->article_title;
        $article->excerpt = $request->article_excerpt;
        $article->description = $request->article_description;
        $article->author = $request->article_author;
        $article->image_id = $request->article_image_id;
        $article->category_id = $request->article_dcategory_id; -->
            <th>Id</th>
            <th>Article Title</th>
            <th>Article Excerpt</th>
            <th>Article Description</th>
            <th>Article Author</th>
            <th>Article Image</th>
            <th>Article Categories</th>
            <th>Actions</th>
        </tr>

        @foreach ($articles as $article)
        <tr>
            <td>{{$article->id}}</td>
            <td>{{$article->title}}</td>
            <td>{{$article->excerpt}}</td>
            <td>{{$article->description}}</td>
            <td>{{$article->author}}</td>
 
                
           <td>
                <img id='image{{$article->articleImages->id}}' class='{{$article->articleImages->class}}' 
                src='{{$article->articleImages->src}}' alt='{{$article->articleImages->alt}}' 
                width='{{$article->articleImages->width}}' height='{{$article->articleImages->height}}' />
           </td>
            
            <td>{{$article->articlecategoryArticles->title}}</td>
            




            <td>
                <a class="btn btn-primary" href="{{route('article.edit', [$article])}}">Edit</a>
                <a class="btn btn-secondary" href="{{route('article.show', [$article])}}">Show</a>

                <form method="post" action="{{route('article.destroy', [$article])}}">
                    @csrf
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
    <a class="btn btn-secondary" href="{{route('nav')}}">Back</a>

    </div>
    @endsection