<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;
use DB;
use App\Product;

class SearchController extends Controller
{
    
    public function index(){

	    $categories = DB::table('product_categories')->get();

    	return view('search', compact('categories',$categories));
    }

    public function search(Request $request){

	    $categories = DB::table('product_categories')->get();

    	$inputs = $request->all();

    	$category = $inputs['category'];
    	$products = Product::whereHas('category', function($q) use($category){
					   		$q->where('id', '=', $category);
						})->get();
    	return view('search', compact('products','categories'));
    }



    /**
     * Display Product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showproduct($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

}
