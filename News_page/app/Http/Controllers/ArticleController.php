<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleImage;
use App\Models\ArticleCategory;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // rikiavimas - duomenu kiekis nesikeicia, keiciasi tik duomenu tvarka pagal tam tikra atributa
        //filtravimas - keiciasi duomenu kiekis, atrenkant duomenis pagal tam tikra atributa
        //
        $articles = Article::all();
        return view('articles.index',['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ArticleCategory::all();
        $images = ArticleImage::all();
        return view('articles.create', ['categories' => $categories, 'images'=> $images]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $article = new Article;

        $article->title = $request->article_title;
        $article->excerpt = $request->article_excerpt;
        $article->description = $request->article_description;
        $article->author = $request->article_author;
        $article->image_id = $request->article_image_id;
        $article->category_id = $request->article_category_id;

        $article->save();

        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show',['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = ArticleCategory::all();
        $images = ArticleImage::all();
        return view('articles.edit',['article' => $article, 'categories'=>$categories,'images'=>$images]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->title = $request->article_title;
        $article->excerpt = $request->article_excerpt;
        $article->description = $request->article_description;
        $article->author = $request->article_author;
        $article->image_id = $request->article_image_id;
        $article->category_id = $request->article_category_id;

        $article->save();

        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index');
    }
}
