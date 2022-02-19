@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Post</h1>
        <form method="POST" action="{{route('post.store')}}" >

            <input class="form-control" type='text' name="post_title" placeholder="post title"/>
            <input class="form-control" type='text' name="post_excerpt" placeholder="post excerpt"/>
            <input class="form-control" type='text' name="post_description" placeholder="post description"/>
            <input class="form-control" type='text' name="post_author" placeholder="post author"/>

    

            <select class="form-control" name="post_category_id" placeholder="post category">
                <option value="" disabled selected>Please select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{$category -> id}}" >{{$category->title}}</option>
                    @endforeach
            </select>


            @csrf

            <button class="btn btn-primary" type='submit'>Add</button>
            <a class="btn btn-secondary" href="{{ url()->previous() }}">Back</a>
        </form>
    </div>
    @endsection