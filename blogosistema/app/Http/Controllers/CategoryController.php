<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        $categories = Category:: withCount('categoryPosts')->sortable()->paginate(5);
        
        return view('categories.index',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $table->string('title');
        //     $table->longText('description');
        //     $table->text('category_editor');
        $category = new Category;

        $category->title = $request->category_title;
        $category->description = $request->category_description;
        $category->category_editor = $request->category_editor;

        $category->save();
        if($request->category_newposts) {
            
            $posts_count = count($request->post_title);

            for($i=0; $i< $posts_count; $i++) {
                $post = new Post;
                $post->title = $request->post_title[$i];
                $post->excerpt = $request->post_excerpt[$i];
                $post->description = $request->post_description[$i];
                $post->author = $request->post_author[$i];
                $post->category_id = $category->id;

                $post->save();
            }
        }

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $posts = $category -> categoryPosts;
        return view('categories.show',['category' => $category, 'posts' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $posts = $category -> categoryPosts;
        return view('categories.edit',['category' => $category, 'posts' => $posts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $category->title = $request->category_title;
        $category->description = $request->category_description;
        $category->category_editor = $request->category_editor;


        $category->save();

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $posts = $category -> categoryPosts;

        if(count($posts) != 0) {
            return redirect()->route('category.index')->with('error_message', 'Delete is not possible because Category has Posts linked to it');
        }

        $category->delete();
        return redirect()->route('category.index')->with('success_message', 'Everything is fine');
    }

    public function masscreate(Request $request) {

        $posts = Post::all();
        return view('categories.masscreate',['posts'=>$posts]);

    }
    
}
