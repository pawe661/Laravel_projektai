@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Article</h1>
        <form method="POST" action="{{route('article.store')}}" >

            <input class="form-control" type='text' name="article_title" placeholder="Article title"/>
            <input class="form-control" type='text' name="article_excerpt" placeholder="Article excerpt"/>
            <input class="form-control" type='text' name="article_description" placeholder="Article description"/>
            <input class="form-control" type='text' name="article_author" placeholder="Article author"/>

            
            <select class="form-control" name="article_image_id" placeholder="Article image">
                <option value="" disabled selected>Please select Category</option>
                    @foreach ($images as $image)
                        <option value="{{$image -> id}}" >{{$image->alt}}</option>
                    @endforeach
            </select>

            <select class="form-control" name="article_category_id" placeholder="Article category">
                <option value="" disabled selected>Please select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{$category -> id}}" >{{$category->title}}</option>
                    @endforeach
            </select>


            @csrf

            <button class="btn btn-primary" type='submit'>Add</button>
            <a class="btn btn-secondary" href="{{route('article.index')}}">Back</a>
        </form>
    </div>
    @endsection