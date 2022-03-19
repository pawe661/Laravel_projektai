@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Post</h1>
        <form method="POST" action="{{route('post.store')}}" >
        
            <div class="form-group">
                <input class="form-control" type='text' name="post_title" placeholder="post title"/>
                <input class="form-control" type='text' name="post_excerpt" placeholder="post excerpt"/>
                <input class="form-control" type='text' name="post_description" placeholder="post description"/>
                <input class="form-control" type='text' name="post_author" placeholder="post author"/>
            </div>
            <div class="form-group category_select">
                <select class="form-control" name="post_category_id" placeholder="post category">
                    <option value="" disabled selected>Please select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category -> id}}" >{{$category->title}}</option>
                        @endforeach
                </select>
            </div>
        <br/>
            <div class="form-group">
                <label for="post_newcategory">Add new category?</label>
                <input id="post_newcategory" type="checkbox" name="post_newcategory"/>
            </div>
            <div class="category_info d-none">
                <div class="form-group">
                    <input class="form-control" type='text' name="category_title" placeholder="category title"/>
                    <input class="form-control" type='text' name="category_description" placeholder="category description"/>
                    <input class="form-control" type='text' name="category_editor" placeholder="category editor"/>
                </div>
            </div>
            @csrf
            <div class="form-group">
                <button class="btn btn-primary" type='submit'>Add</button>
            </div>
        </form>
        <a class="btn btn-secondary" href="{{ url()->previous() }}">Back</a>
    </div>

    <script>
    $(document).ready(function(){
        $('#post_newcategory').click(function(){
            //addClass - prideda kazkokia klase
            //removeClass - nuima kazkokia klase
            //toggleClass - nuima kazkokia klase kai ji elemente egzistuoja, uzdeda kazkokia klase jei ta klase elemente neegzistuoja
            $(".category_info").toggleClass('d-none');
            $(".category_select").toggleClass('d-none');
        })
    })
</script>    
@endsection
    