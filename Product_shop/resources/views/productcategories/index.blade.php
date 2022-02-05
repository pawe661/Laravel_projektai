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

            <td>{{count($productCategory->pcategoryProducts)}}</td>
            
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