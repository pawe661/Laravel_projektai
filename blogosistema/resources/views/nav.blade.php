@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Welcome choose what to work with</h1>

    <a class="btn btn-secondary" href="{{route('post.index')}}">Posts</a>
    <a class="btn btn-secondary" href="{{route('category.index')}}">Categories</a>
    <a class="btn btn-secondary" href="{{route('task.index')}}">Tasks</a>
    <a class="btn btn-secondary" href="{{route('owner.index')}}">Owners</a>
    
</div>
    @endsection