@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Product</h1>

        <form method="POST" action="{{route('product.update', [$product])}}" >
            <input class="form-control" type='text' name="product_title" value="{{$product->title}}" placeholder="Product title"/>
            <input class="form-control" type='text' name="product_description" value="{{$product->description}}" placeholder="Product description"/>
            <input class="form-control" type='number' name="product_price" value="{{$product->price}}" placeholder="Product price"/>


    
                <select class="form-control" name="product_category_id" placeholder="Product category">
                    @foreach ($productCategories as $category)
                        @if ($category->id == $product->category_id)
                        <option value="{{$category -> id}}" selected>{{$category->title}}</option>
                        @else 
                        <option value="{{$category -> id}}" >{{$category->title}}</option>
                        @endif
                    @endforeach
                </select>

            <input class="form-control" type='text' name="product_image_url" value="{{$product->image_url}}" placeholder="Product image"/>
                
                @csrf
            <button class="btn btn-primary" type='submit'>Add</button>
            <a class="btn btn-secondary" href="{{route('product.index')}}">Back</a>
        </form>

    </div>
    @endsection