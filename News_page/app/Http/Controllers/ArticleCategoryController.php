<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use App\Http\Requests\StoreArticleCategoryRequest;
use App\Http\Requests\UpdateArticleCategoryRequest;

use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articleCategories = ArticleCategory::all();
        return view('articlecategories.index',['articleCategories' => $articleCategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articlecategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $table->string('title');
        // $table->longText('description');
        $articleCategory = new ArticleCategory;

        $articleCategory->title = $request->category_title;
        $articleCategory->description = $request->category_description;


        $articleCategory->save();

        return redirect()->route('articlecategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleCategory $articleCategory)
    {
        $articles = $articleCategory -> articlesArticlecategory;
        return view('articlecategory.show',['articleCategory' => $articleCategory, 'articles'=>$articles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleCategory $articleCategory)
    {
        $articles = $articleCategory -> articlecategoryArticles;
        return view('articlecategory.edit',['articleCategory' => $articleCategory, 'articles'=>$articles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleCategoryRequest  $request
     * @param  \App\Models\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleCategory $articleCategory)
    {
        $articleCategory->title = $request->category_title;
        $articleCategory->description = $request->category_description;


        $articleCategory->save();

        return redirect()->route('articlecategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleCategory $articleCategory)
    {
        $articles = $articleCategory->articlecategoryArticles; 

        if(count($articles) != 0) {
            return redirect()->route('articlecategory.index')->with('error_message', 'Delete is not possible because Category has articles linked to it');
        }

        $articleCategory->delete();
        return redirect()->route('articlecategory.index')->with('success_message', 'Everything is fine');
    }
}
