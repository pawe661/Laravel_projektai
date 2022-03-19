
@extends('layouts.app')

@section('content')
<div class="container">

    <table class="table table-striped">
    <tr>
            <th>Id
            
            </th>
            <th>Product Title 
           
            </th>
            <th>Product Description</th>
            <th>Product Price
             
                </a>
            </th>
            <th>Product Categories
            
                </a>
            </th>
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
@endsection