@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Article</h1>

        <form method="POST" action="{{route('article.update', [$article])}}" >
            <input class="form-control" type='text' name="{{$article->title}}" placeholder="Article title"/>
            <input class="form-control" type='text' name="{{$article->excerpt}}" placeholder="Article excerpt"/>
            <input class="form-control" type='text' name="{{$article->description}}" placeholder="Article description"/>
            <input class="form-control" type='text' name="{{$article->author}}" placeholder="Article author"/>

                <select class="form-control" name="article_image_id" placeholder="Article image">
                    @foreach ($articles->articleImages as $image)
                        @if ($image->id == $article->image_id)
                        <option value="{{$image -> id}}" selected>{{$image->alt}}</option>
                        @else 
                        <option value="{{$image -> id}}" >{{$image->alt}}</option>
                        @endif
                    @endforeach
                </select>
    
                <select class="form-control" name="article_category_id" placeholder="Article category">
                    @foreach ($categories as $category)
                        @if ($category->id == $article->category_id)
                        <option value="{{$category -> id}}" selected>{{$category->title}}</option>
                        @else 
                        <option value="{{$category -> id}}" >{{$category->title}}</option>
                        @endif
                    @endforeach
                </select>

>

            <select class="form-control" name="article_category_id" placeholder="Article category">
                <option value="" disabled selected>Please select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{$category -> id}}" >{{$category->title}}</option>
                    @endforeach
            </select>
            @csrf

            <button class="btn btn-primary" type='submit'>Add</button>
            <a class="btn btn-secondary" href="{{route('group.index')}}">Back</a>
        </form>

    </div>
    @endsection