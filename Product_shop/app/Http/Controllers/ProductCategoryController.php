<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\Product;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;

use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $sortCollumn  = $request->sortCollumn;
        $sortOrder = $request->sortOrder; 
       
        if(empty($sortCollumn) || empty($sortOrder)) {
            $productCategories = ProductCategory::all();
           
            foreach($productCategories as $key => $category){
                $category['pcategory_products_count'] = count($category->pcategoryProducts->toArray());
                $productCategories[$key] = $category;
            }
            // print_r($productCategories);
        } else {
            if($sortCollumn !== 'pcategory_products_count'){
            
            $productCategories = ProductCategory::orderBy($sortCollumn, $sortOrder )->get();

            foreach($productCategories as $key => $category){
                $category['pcategory_products_count'] = count($category->pcategoryProducts->toArray());
                $productCategories[$key] = $category;
            }
            }else{
            $tempsort = false;

                if($sortOrder == 'desc'){
                    $tempsort = true;
                }
            $productCategories = ProductCategory::withCount('pcategoryProducts') ->get()
            ->sortBy('pcategory_products_count', SORT_REGULAR, $tempsort);
            }
        }
        $select_array =  array_keys($productCategories->first()->getAttributes());
        return view('productcategories.index',['productCategories' => $productCategories, 'sortCollumn' =>$sortCollumn, 'sortOrder'=> $sortOrder, 'select_array' => $select_array,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('productcategories.create',['products'=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $table->id();
        // $table->string('title');
        // $table->longText('description');
        // $table->timestamps();

        $productCategory = new ProductCategory;

        $productCategory->title = $request->category_title;
        $productCategory->description = $request->category_description;


        $productCategory->save();

        return redirect()->route('productcategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        $products = $productCategory->pcategoryProducts; 
        return view('productcategories.edit',['productCategory' => $productCategory, 'products'=>$products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductCategoryRequest  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productCategory)
    {

        $productCategory->title = $request->category_title;
        $productCategory->description = $request->category_description;

        $productCategory->save();

        return redirect()->route('productcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        $products = $productCategory->pcategoryProducts; 

        if(count($products) != 0) {
            return redirect()->route('productcategory.index')->with('error_message', 'Delete is not possible because Category has products linked to it');
        }

        $productCategory->delete();
        return redirect()->route('productcategory.index')->with('success_message', 'Everything is fine');
    }
}
