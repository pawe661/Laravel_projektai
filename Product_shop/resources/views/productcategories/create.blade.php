@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Product Category</h1>
        <form method="POST" action="{{route('productcategory.store')}}" >
            <input class="form-control" type='text' name="category_title" placeholder="Category title"/>
            <input class="form-control" type='text' name="category_description" placeholder="Category description"/>
            @csrf

            <button class="btn btn-primary" type='submit'>Add</button>
            <a class="btn btn-secondary" href="{{route('productcategory.index')}}">Back</a>
        </form>

    </div>
    @endsection