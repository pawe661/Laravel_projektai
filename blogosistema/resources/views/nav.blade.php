@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Welcome choose what to work with</h1>

    <a class="btn btn-secondary" href="{{route('article.index')}}">Posts</a>
    <a class="btn btn-secondary" href="{{route('articlecategory.index')}}">Categories</a>
    
</div>
    @endsection