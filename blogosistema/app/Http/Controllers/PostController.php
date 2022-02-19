<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category_id = $request->category_id;
        $categories = Category::all();
        
      
        if(empty($category_id) || $category_id == 'all') {
            $posts = Post::sortable()->paginate(25); 
        } else {
            $posts = Post::where('category_id', '=', $category_id)->sortable()->paginate(25);
        }    
    
        return view('posts.index',['posts' => $posts, 'categories'=>$categories, 'category_id'=>$category_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $table->string('title');
        //     $table->text('excerpt');
        //     $table->longText('description');
        //     $table->text('author');
        //     $table->unsignedBigInteger('category_id');
        $post = new Post;

        $post->title = $request->post_title;
        $post->excerpt = $request->post_excerpt;
        $post->description = $request->post_description;
        $post->author = $request->post_author;
        
        if($request->post_newcategory){

            $category = new Category;

            $category->title = $request->category_title;
            $category->description = $request->category_description;
            $category->category_editor = $request->category_editor;

            $category->save();

            $post ->category_id = $category ->id;
        }else{
            $post->category_id = $request->post_category_id;
        }

        $post->save();

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        
        return view('posts.show',['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        
        return view('posts.edit',['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->post_title;
        $post->excerpt = $request->post_excerpt;
        $post->description = $request->post_description;
        $post->author = $request->post_author;
        $post->category_id = $request->post_category_id;

        $post->save();

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function masscreate(Request $request) {

        $categories = Category::all();
        return view('posts.masscreate',['categories'=>$categories]);

    }
    
}
