<?php

namespace App\Http\Controllers;

use App\Models\ArticleImage;
use App\Http\Requests\StoreArticleImageRequest;
use App\Http\Requests\UpdateArticleImageRequest;

use Illuminate\Http\Request;

class ArticleImageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articleImages = ArticleImage::all();
        return view('articleimages.index',['articleImages'=> $articleImages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articleimages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $table->id();
        // $table->string('alt');
        // $table->text('src');
        // $table->text('width');
        // $table->text('height');
        // $table->string('class');
        // $table->timestamps();
        $articleImage = new ArticleImage;

        $articleImage->alt = $request->image_alt;

        $imageName = 'image' . time().'.'.$request->image_src->extension();
        $request->image_src->move(public_path('images') , $imageName);
        $articleImage->src = $imageName;

        $articleImage->width = $request->image_width;
        $articleImage->height = $request->image_height;
        $articleImage->class = $request->image_class;

        $articleImage->save();

        return redirect()->route('articleimage.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArticleImage  $articleImage
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleImage $articleImage)
    {
        return view('articleimages.show', ['articleImage'=>$articleImage]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArticleImage  $articleImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleImage $articleImage)
    {
        return view('articleimages.edit',['articleImage' => $articleImage]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleImageRequest  $request
     * @param  \App\Models\ArticleImage  $articleImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleImage $articleImage)
    {
        $articleImage->alt = $request->image_alt;
        
        if($request->has('image_src')) {
            $imageName = 'image' . time().'.'.$request->image_src->extension();
            $request->image_src->move(public_path('images') , $imageName);
            $articleImage->src = $imageName;
        }
        $articleImage->width = $request->image_width;
        $articleImage->height = $request->image_height;
        $articleImage->class = $request->image_class;

        $articleImage->save();

        return redirect()->route('articleimage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticleImage  $articleImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleImage $articleImage)
    {
        $articles = $articleImage->imagesArticle; 

        if(count($articles) != 0) {
            return redirect()->route('articleimages.index')->with('error_message', 'Delete is not possible because image has article associated with it.');
        }

        $articleImage->delete();
        return redirect()->route('articleimages.index')->with('success_message', 'Everything is fine');

    }
}
