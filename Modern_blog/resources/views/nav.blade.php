@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Welcome choose what to work with</h1>

    <a class="btn btn-secondary" href="{{route('article.index')}}">Articles</a>
    <a class="btn btn-secondary" href="{{route('type.index')}}">Types</a>

    
</div>
    @endsection