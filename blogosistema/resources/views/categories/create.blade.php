@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Create Category</h1>
        <form method="POST" action="{{route('category.store')}}" >
            <input class="form-control" type='text' name="category_title" placeholder="category title"/>
            <input class="form-control" type='text' name="category_description" placeholder="category description"/>
            <input class="form-control" type='text' name="category_editor" placeholder="category editor"/>
            @csrf

            <button class="btn btn-primary" type='submit'>Add</button>
            <a class="btn btn-secondary" href="{{ url()->previous() }}">Back</a>
        </form>

    </div>
    @endsection