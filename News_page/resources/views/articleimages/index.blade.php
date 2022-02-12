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

    @if (count($articleImages) == 0)
    <p>There are no Images</p>
    @endif
  
    <a class="btn btn-primary" href="{{route('articleimage.create')}}">Create new Article</a>
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Article Image Atl text</th>
            <th>Article Image</th>
            <th>Article Image Width</th>
            <th>Article Image Height</th>
            <th>Article Image Class</th>
            
            <th>Associated Article </th>
            <th>Actions</th>
        </tr>

        @foreach ($articleImages as $articleImage)
        <tr>
            <td>{{$articleImage->id}}</td>
            <td>{{$articleImage->alt}}</td>
            <td><img id='image{{$articleImage->id}}' class='{{$articleImage->class}}' 
                src='{{asset($articleImage->src)}}' alt='{{$articleImage->alt}}' 
                width='{{$articleImage->width}}' height='{{$articleImage->height}}' /></td>
            <td>{{$articleImage->width}}</td>
            <td>{{$articleImage->height}}</td>
            <td>{{$articleImage->class}}</td>
            <td>{{$articleImage->imagesArticle['title']}}</td>
 
            <td>
                <a class="btn btn-primary" href="{{route('articleimage.edit', [$articleImage])}}">Edit</a>
                <a class="btn btn-secondary" href="{{route('articleimage.show', [$articleImage])}}">Show</a>

                <form method="post" action="{{route('articleimage.destroy', [$articleImage])}}">
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