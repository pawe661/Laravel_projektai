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
    <h1>Product Categories Index</h1>

    @if (count($productCategories) == 0)
    <p>There are no Categories</p>
    @endif

    <form method="GET" action="{{route('productcategory.index')}}">
        @csrf
        <select name="sortCollumn">
            @foreach ($select_array as $key=>$item)
                @if($item == $sortCollumn || ($key == 0 && empty($sortCollumn)) )
                    <option value="{{$item}}" selected>{{$item}}</option>
                @else 
                <option value="{{$item}}" >{{$item}}</option>
                @endif
                
            @endforeach
        </select>    
        <select name="sortOrder">
            @if ($sortOrder == 'asc' || empty($sortOrder))
                <option value="asc" selected>Ascending</option>
                <option value="desc">Descending</option>
            @else 
                <option value="asc">Ascending</option>
                <option value="desc" selected>Descending</option>
            @endif
        </select>    
        <button type="submit">Rikiuok</button>
    </form>

    <a class="btn btn-primary" href="{{route('productcategory.create')}}">Create new Category</a>
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Category Title</th>
            <th>Category Description</th>
            <th>Number of Products in category</th>
            <th>Actions</th>
        </tr>

        @foreach ($productCategories as $productCategory)
        <tr>
            <td>{{$productCategory->id}}</td>
            <td>{{$productCategory->title}}</td>
            <td>{{$productCategory->description}}</td>

            <td>{{$productCategory->product_count}}</td>
            
            <td>
                <a class="btn btn-primary" href="{{route('productcategory.edit', [$productCategory])}}">Edit</a>

                <form method="post" action="{{route('productcategory.destroy', [$productCategory])}}">
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