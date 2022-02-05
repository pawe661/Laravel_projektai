@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Welcome choose what to work with</h1>

    <a class="btn btn-secondary" href="{{route('product.index')}}">Product</a>
    <a class="btn btn-secondary" href="{{route('productcategory.index')}}">Product categories</a>
    


</div>
    @endsection