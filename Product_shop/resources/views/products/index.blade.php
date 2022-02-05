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
    <h1>Product Index</h1>

    @if (count($products) == 0)
    <p>There are no Products</p>
    @endif
  
    <a class="btn btn-primary" href="{{route('product.create')}}">Create new Product</a>
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Product Title 
                <a href="{{route('product.index')}}?sort=@if($sort =='asc') desc @else asc @endif">
                @if($sort =='asc') <i class="bi bi-sort-alpha-down"></i>
                 @else <i class="bi bi-sort-alpha-up"></i> @endif
                </a>
        </th>
            <th>Product Description</th>
            <th>Product Price</th>
            <th>Product Categories</th>
            <th>Product Image</th>
            <th>Actions</th>
        </tr>

        @foreach ($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->title}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->productPCategory->title}}</td>

            <td><img src='{{$product->image_url}}' alt='product image' width="100" height="100"/></td>
            
            <td>
                <a class="btn btn-primary" href="{{route('product.edit', [$product])}}">Edit</a>

                <form method="post" action="{{route('product.destroy', [$product])}}">
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