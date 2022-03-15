<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Type;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Http\Request;
use Validator;

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

    public function indexAjax() {


        $articles = Article::with('articleType')->sortable()->get();


        $articles_array = array(
            'articles' => $articles
        );

        $json_response =response()->json($articles_array); 

        return $json_response;
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

        $input = [
            'article_title'=> $request->article_title,
            'article_description'=> $request->article_description,
            'article_type'=> $request->article_type,

        ];

        $rules = [
            'article_title'=> 'required|string|max:16',
            'article_description'=> 'required|min:10',
            'article_type' => 'required|numeric|gt:0',
        ];

        $customMessages = [
            'required' => "This field is required"
        ];

        $validator = Validator::make($input, $rules);

        if($validator->fails()) {
            $errors = $validator->messages()->get('*'); //pasiima visu ivykusiu klaidu sarasa
            $article_array = array(
                'errorMessage' => "validator fails",
                'errors' => $errors
            );
        } else {
        $article = new Article();

        $article->title = $request->article_title;
        $article->description = $request->article_description;
        $article->type_id = $request->article_type;

        $article->save();

        $sort = $request->sort ;
        $direction = $request->direction ;

        $articles = Article::with("articleType")->sortable([$sort => $direction ])->get();

        $article_array = array(
            'successMessage' => "Article stored succesfuly",
            'articleID' => $article->id,
            'articleTitle' => $article->title,
            'articleDescription' => $article->description,
            'articleType' => $article->type_id,
            'articleTypeDisplay' => $article->articleType->title,
            'articles' => $articles
        );
        }
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
        return view("article.show", ['article' => $article]);
    }
   
    public function showAjax(Article $article) {
        
        $article_array = array(
            'successMessage' => "Article viewed succesfuly",
            'articleID' => $article->id,
            'articleTitle' => $article->title,
            'articleDescription' => $article->description,
            'articleType' => $article->type_id,
            'articleTypeDisplay' => $article->articleType->title,
        );

        $json_response =response()->json($article_array); 

        return $json_response;
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
    public function update(Request $request, Article $article)
    {
        $article->title = $request->article_title;
        $article->description = $request->article_description;
        $article->type_id = $request->article_type;

        $article->save();
        return redirect()->route('article.index');
    }

    public function updateAjax(Request $request, Article $article)
    {
        $article->title = $request->article_title;
        $article->description = $request->article_description;
        $article->type_id = $request->article_type;

        $article->save();

        $article_array = array(
            'successMessage' => "Article viewed succesfuly",
            'articleID' => $article->id,
            'articleTitle' => $article->title,
            'articleDescription' => $article->description,
            'articleType' => $article->type_id,
            'articleTypeDisplay' => $article->articleType->title,
        );

        // 
        $json_response =response()->json($article_array); //javascript masyva

        return $json_response;
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

    public function massdestroyAjax(Request $request)
    {
        $ids = $request->article;
        
        // dd($ids);
        $ids_array = explode(",", $ids);
        
        $articles = Article::whereIn('id',$ids_array)->get();
        
        $response_array = array();
        foreach ($articles as $key => $article) {
        
            $article->delete();
            // reikia prideti kad po ciklo prisidetu po istrinta id
            $response_array[] = array(
                'successMessage' => "Article deleted successfuly". $article->id,
            );
        }
         
        $json_response =response()->json($response_array);
        // dd($response_array);
        return $json_response;
    }
    public function searchAjax(Request $request) {

        $searchValue = $request->searchValue;
        $articlesAll = Article::with("articleType");
        // sugalvoti kaip čia pridėti ryšį
        $articles = Article::query()
        ->where('title', 'like', "%{$searchValue}%")
        ->orWhere('description', 'like', "%{$searchValue}%")
        // ->orWhere('typeDisplay', 'like', "%{$searchValue}%")
        ->get();
        
        
        if(empty($searchValue)){   
            $articles_array = array(
                'articles' => $articlesAll
            );
        }elseif(count($articles) > 0) {
            $articles_array = array(
                'articles' => $articles,
            );
        } else {
            $articles_array = array(
                'errorMessage' => 'No articles found'
            );
        }

        

        $json_response =response()->json($articles_array);

        return $json_response;

    }
}
