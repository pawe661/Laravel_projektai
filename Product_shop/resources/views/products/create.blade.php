@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Product</h1>
        <form method="POST" action="{{route('product.store')}}" >

            <input class="form-control" type='text' name="product_title" placeholder="Product title"/>
            <input class="form-control" type='text' name="product_description" placeholder="Product description"/>
            <input class="form-control" type='text' name="product_price" placeholder="Product price"/>

            
            <select class="form-control" name="product_category_id" placeholder="Product category">
                <option value="" disabled selected>Please select Category</option>
                    @foreach ($productCategories as $category)
                        <option value="{{$category -> id}}" >{{$category->title}}</option>
                    @endforeach
            </select>
            
            <input class="form-control" type='text' name="product_image_url" placeholder="Product image"/>

            @csrf

            <button class="btn btn-primary" type='submit'>Add</button>
            <a class="btn btn-secondary" href="{{route('product.index')}}">Back</a>
        </form>
    </div>
    @endsection