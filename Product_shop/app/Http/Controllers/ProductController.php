<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //reikalingas filtrui 
        $categories = ProductCategory::orderBy('title', 'asc' )->get();

        // $products = Product::all() ->sortBy('title', SORT_REGULAR, false);
        $sortBy = request('selector','id');
        $sort = request('sort','asc');
        if($sortBy == "category_id") {

          //kad padaryti orderBy su priklausomais stulpeliais reikia SQL kodo

                // $categorytitle = function($query){
                //     return $query->productPCategory->title;
                // };
                    
                // $products = Product::orderBy($categorytitle, $sort)->get();
                // $products = Product::with(['category_id' => function ($q){
                //     $q->orderBy('title', 'DESC');
                // }])
                // ->get();
                $tempsort = false;

                if($sort == 'desc'){
                    $tempsort = true;
                }
                
            $products = Product::get()->sortBy(function($query){
                return $query->productPCategory->title;
            }, SORT_REGULAR, $tempsort )->all();
        }else{
            $products = Product::orderBy($sortBy, $sort)->get();
        }
        
        return view('products.index', ['products' => $products, 'categories'=>$categories,'sortyby'=> $sortBy, 'sort' => $sort]);

        // return view('products.index',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productCategories = ProductCategory::all();
        return view('products.create', ['productCategories' => $productCategories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $table->id();
        // $table->string('title');
        // $table->longText('description');
        // $table->float('price', 8, 2);
        // $table->unsignedBigInteger('category_id');
        // $table->foreign('category_id')->references('id')->on('product_categories');

        // $table->string('image_url');
        // $table->timestamps();
        $product = new Product;

        $product->title = $request->product_title;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->category_id = $request->product_category_id;
        $product->image_url = $request->product_image_url;

        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $productCategories = ProductCategory::all();
        return view('products.edit', ['product' => $product, 'productCategories' => $productCategories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->title = $request->product_title;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->category_id = $request->product_category_id;
        $product->image_url = $request->product_image_url;

        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }

    public function productfilter(Request $request) {
        //1. filtras turi viena inputa kuriame yra select
        //2. tame select yra atvaizduojami visi autoriai
        //3. pasirinktas autorius yra perduodamas per forma i bookfilter funkcija
        //4. ir pagal autoriaus kintamaji mes vykdome filtravima

        // $products = Product::all();

        $category_id = $request->category_id;
        $products = Product::where('category_id', '=' , $category_id)->get();
        return view('products.productfilter', ['products' =>$products]);
    }
}
