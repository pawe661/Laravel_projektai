<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Type;
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
        $articles = Article::all();
        $types = Type::all();

        return view('articles.index', ['articles'=> $articles, 'types'=>$types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article();

        $article->title = $request->article_title;
        $article->description = $request->article_description;
        $article->type_id = $request->article_type;

        $article->save();

        return redirect()->route('article.index');
    }
    public function storeAjax(Request $request) {

        $article = new Article();

        $article->title = $request->article_title;
        $article->description = $request->article_description;
        $article->type_id = $request->article_type;

        $article->save();

        $article_array = array(
            'successMessage' => "Article stored succesfuly",
            'articleId' => $article->id,
            'articleTitle' => $article->title,
            'articleDescription' => $article->description,
            'articleType' => $article->type_id,
            'articleTypeDisplay' => $article->articleType->title,
        );

        // 
        $json_response =response()->json($article_array); //javascript masyvas

        // $html = "<tr><td>".$client->id."</td><td>".$client->name."</td><td>".$client->surname."</td><td>".$client->description."</td></tr>";
        //kazkoki tai atsakyma
        //  return $html;

        //json masyvas/ objektu / javascrip asociatyvus masyvas
        //php masyva => json masyva
        // json masyva => php masyva
        return $json_response;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        //
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
    public function destroyAjax(Article $article)
    {
        $article->delete();

        $success_array = array(
            'successMessage' => "Article deleted successfuly". $article->id,
        );

        // 
        $json_response =response()->json($success_array);

        return $json_response;
    }
}
