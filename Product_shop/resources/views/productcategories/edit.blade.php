@extends('layouts.app')

@section('content')
<div class="container">
        <h1>Edit Product Category</h1>

        <form method="POST" action="{{route('productcategory.update', [$productCategory])}}" >
            <input class="form-control" type='text' name="category_title" value='{{$productCategory->title}}' placeholder="Category title"/>
            <input class="form-control" type='text' name="category_description" value='{{$productCategory->description}}' placeholder="Category description"/>
           
            @csrf

            <button class="btn btn-primary" type='submit'>Add</button>
            <a class="btn btn-secondary" href="{{route('productcategory.index')}}">Back</a>
        </form>

    </div>
    @endsection