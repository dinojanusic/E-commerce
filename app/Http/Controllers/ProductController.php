<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use App\User;
use Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{

  public function __construct()
  {
      // middleware for superadmin
      $this->middleware('admin')->only('create', 'store', 'edit', 'update', 'admin');

      //FIXME HIGH dodati jos jedan middleware za poslodavca

      //primjer za buduće dorade
      /*
       //FIXME ako dajemo pristup samo indexu
      $this->middleware('admin')->only('index');
      //FIXME ako dajemo pristup svemu osim store
      $this->middleware('admin')->except('store');
      */
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { $count = Product::count();
      $count_user = User::count();
      $products = Product::orderBy('created_at','desc')->paginate(8);
      return view('product.index')->with('products',$products)->with('count',$count)->with('count_user',$count_user);

    }
    public function admin()
    { $count = Product::count();
      $count_user = User::count();
      return view('product.admin')->with('count',$count)->with('count_user',$count_user);
    }
    public function product_games()
    {
      $products = Product::where('category_id','=', 3)->paginate(8);
      return view('product.games')->with('products',$products);
    }
    public function product_laptops()
    {
      $products = Product::where('category_id','=', 1)->paginate(8);
      return view('product.laptops')->with('products',$products);
    }
    public function product_tv()
    {
      $products = Product::where('category_id','=', 2)->paginate(8);
      return view('product.tv')->with('products',$products);
    }

    public function cart()
      {
          return view('product.cart');
      }
      public function addToCart($id)
      {
        $product = Product::find($id);

       if(!$product) {

           abort(404);

       }

       $cart = session()->get('cart');

       // if cart is empty then this the first product
       if(!$cart) {

           $cart = [
                   $id => [
                       "name" => $product->name,
                       "quantity" => 1,
                       "price" => $product->price,
                       "photo" => $product->photo
                   ]
           ];

           session()->put('cart', $cart);

           return redirect()->back()->with('success', 'Product added to cart successfully!');
       }

       // if cart not empty then check if this product exist then increment quantity
       if(isset($cart[$id])) {

           $cart[$id]['quantity']++;

           session()->put('cart', $cart);

           return redirect()->back()->with('success', 'Product added to cart successfully!');

       }

       // if item not exist in cart then add to cart with quantity = 1
       $cart[$id] = [
           "name" => $product->name,
           "quantity" => 1,
           "price" => $product->price,
           "photo" => $product->photo
       ];

       session()->put('cart', $cart);

       return redirect()->back()->with('success', 'Product added to cart successfully!');
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {

        // categories data
        $count = Product::count();
        $count_user = User::count();
        $categories = \App\Category::all();
        $categories_data = [];
        foreach ($categories as $category) {
            $categories_data[$category->id] = $category->name;
        }
        return view('product.create')->with('categories_data', $categories_data)->with('count',$count)->with('count_user',$count_user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'name' => 'required',
        'description' => 'required',
        'price' => 'required',
        'photo' => 'image|nullable|max:1999',
        'category_id' => ''

      ]);
      // Handle file upload
      if ($request->hasFile('photo')) {
        // Get file name with extensions
        $fileNameWithExt = $request->file('photo')->getClientOriginalName();
        // get jus filename
        $filename =pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $request->file('photo')->getClientOriginalExtension();
        //Filename to Store$fileNameToStoe
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        // Upload image
        $path = $request->file('photo')->storeAs('public/photo', $fileNameToStore);
      }else {
        $fileNameToStore = 'noimage.jpg';
      }

      // create posts

      $product = new Product;
      $product->name = $request->input('name');
      $product->description = $request->input('description');
      $product->price = $request->input('price');
      $product->category_id = $request->input('category_id');
      $product->photo = $fileNameToStore;
      $product->save();


      return redirect('/product/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('product.show')->with('product', $product);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'name' => 'required',
        'description' => 'required',
        'price' => 'required',
        'photo' => 'image|nullable|max:1999',
        'category_id' => ''

      ]);
      // Handle file upload
      if ($request->hasFile('photo')) {
        // Get file name with extensions
        $fileNameWithExt = $request->file('photo')->getClientOriginalName();
        // get jus filename
        $filename =pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $request->file('photo')->getClientOriginalExtension();
        //Filename to Store$fileNameToStoe
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        // Upload image
        $path = $request->file('photo')->storeAs('public/photo', $fileNameToStore);
      }else {
        $fileNameToStore = 'noimage.jpg';
      }

      // create posts

      $product = Product::find($id);
      $product->name = $request->input('name');
      $product->description = $request->input('description');
      $product->price = $request->input('price');
      $product->category_id = $request->input('category_id');
      if ($request->hasFile('photo')) {
          $product->photo = $fileNameToStore;
      }
      $product->save();

      return redirect('/product/index');
    }

    public function updatecart(Request $request)
    {
      if($request->id and $request->quantity)
      {
          $cart = session()->get('cart');

          $cart[$request->id]["quantity"] = $request->quantity;

          session()->put('cart', $cart);

          session()->flash('success', 'Cart updated successfully');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $product = Product::find($id);
      $product->delete();
      return redirect('/product/index')->with('success', 'Proizvod je obrisan');
    }

    public function remove(Request $request){
      if($request->id) {
        $user = User::find($id);
        $user->delete();
        return redirect('/user/index')->with('success', 'Korisnik je obrisan');
            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }
}
