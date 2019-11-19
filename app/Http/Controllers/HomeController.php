<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product::orderBy('created_at','desc')->paginate(4);
      $product_laptops = Product::where('category_id','=', 1)->paginate(8);
      $product_tv = Product::where('category_id','=', 2)->paginate(8);
      $categories = Category::all();
      return view('home')->with('products',$products)->with('categories', $categories)->with('product_laptops', $product_laptops)
      ->with('product_tv', $product_tv);

    }
}
