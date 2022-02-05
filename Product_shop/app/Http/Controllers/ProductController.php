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

        // $products = Product::all() ->sortBy('title', SORT_REGULAR, false);
        $sort = request('sort','asc');

        $products = Product::orderBy('title',$sort)->get();
        return view('products.index', ['products' => $products, 'sort' => $sort]);

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
}
