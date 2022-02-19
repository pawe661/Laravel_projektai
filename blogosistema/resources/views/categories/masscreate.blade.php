@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Create Category</h1>
        <form method="POST" action="{{route('category.store')}}" >
        <div class="form-group">
            <input class="form-control" type='text' name="category_title" placeholder="category title"/>
            <input class="form-control" type='text' name="category_description" placeholder="category description"/>
            <input class="form-control" type='text' name="category_editor" placeholder="category editor"/>
        </div>
            @csrf
        <div class="form-group">
            <label for="category_newposts">Add new Posts?</label>
            <input id="category_newposts" type="checkbox" name="category_newposts"/>
        </div>

        <div class="posts-info d-none">
            <button type="button" class="btn btn-secondary add_field">Add</button>
            <button type="button" class="btn btn-danger remove_field">Remove</button>
            <div class="post-info post-first row">
                <div class="form-group">
                    <input class="form-control" type='text' name="post_title[]" placeholder="post title"/>
                    <input class="form-control" type='text' name="post_excerpt[]" placeholder="post excerpt"/>
                    <input class="form-control" type='text' name="post_description[]" placeholder="post description"/>
                    <input class="form-control" type='text' name="post_author[]" placeholder="post author"/>
                </div>
            </div>

        </div>
        <div class="form-group">
            <button class="btn btn-primary" type='submit'>Add</button>
        </div>
        </form>
        <a class="btn btn-secondary" href="{{ url()->previous() }}">Back</a>
    </div>


    <script>
    $(document).ready(function(){
        $('#category_newposts').click(function() {
            $('.posts-info').toggleClass('d-none');
            //nenorime isaugoti senu reiksmiu
            $('.post-info:not(.post-first)').remove();
            //Laukeliu nunulinimas
            $('#post_title').val('');
            $('#post_excerpt').val('');
            $('#post_description').val('');
            $('#post_author').val('');
        })
        $('.add_field').click(function(){
            $('.posts-info').append('<br/><div class="post-info post-first row"><div class="form-group"><input class="form-control" type="text" name="post_title[]" placeholder="post title"/><input class="form-control" type="text" name="post_excerpt[]" placeholder="post excerpt"/><input class="form-control" type="text" name="post_description[]" placeholder="post description"/><input class="form-control" type="text" name="post_author[]" placeholder="post author"/></div></div>');
        });
        $('.remove_field').click(function() {
            //kaip pasirinkti paskutini elementa kurio clase yra input-rating
            $('.post-info:last-child:not(.post-first)').remove();
        });
    })
</script> 
    @endsection