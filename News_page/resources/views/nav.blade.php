@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Welcome choose what to work with</h1>

    <a class="btn btn-secondary" href="{{route('article.index')}}">Articles</a>
    <a class="btn btn-secondary" href="{{route('articlecategory.index')}}">Article categories</a>
    <a class="btn btn-secondary" href="{{route('articleimage.index')}}">Article images</a>

</div>
    @endsection