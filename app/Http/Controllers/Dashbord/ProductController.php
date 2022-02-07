<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class ProductController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('dashboard.products.index',compact(['products','categories']));
    }

    public function search(Request $request){
        $query = $request->get('query');
        $categories = Category::all();
        $products = Search::add(Product::class,'product_name')->get($query);
        return view('dashboard.products.index',compact(['products','query','categories']));
    }

    //Show the related products to specific category
    public function SearchWithCategory(Request $request){
        $category_id = $request->get('category');
        $categories = Category::all();
        $products = Search::add(Product::class,'category_id')->get($category_id);
        return view('dashboard.products.index',compact(['products','categories']));
    }

    public function ShowRelatedProducts($id){
        $categories = Category::all();
        $products = Search::add(Product::class,'category_id')->get($id);
        return view('dashboard.products.index',compact(['products','categories']));
    }

    public function create()
    {
        $categories =  Category::all();
        return view('dashboard.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name'=>['required','max:50'],
            'product_description'=>['required','max:50'],
            'purchase_price'=>['required','max:50'],
            'sale_price'=>['required','max:50'],
            'image'=>'required|mimes:jpeg,jpg,png|max:2048',
            'stock'=>['required','max:50'],
            'category'=>['required','max:50'],
        ]);

        $data = $request->all();
        $product= new Product;
        if ($request->file('image')){
            $image = $request->file('image');
            $extention = $image->getClientOriginalExtension();
            $image_name = time().'.'.$extention;
            $image->move('uploads/products_images',$image_name);
            $product->image_path = $image_name;
        }

        $product->product_name = $data['product_name'];
        $product->product_description = $data['product_description'];
        $product->purchase_price = $data['purchase_price'];
        $product->sale_price = $data['sale_price'];
        $product->stock = $data['stock'];

        $product->category_id = $data['category'];
        $product->save();

        return redirect('dashboard/products')->with('status','Product Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('dashboard.products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name'=>['required','max:50'],
            'product_description'=>['required','max:50'],
            'purchase_price'=>['required','max:50'],
            'sale_price'=>['required','max:50'],
            'image'=>'mimes:jpeg,jpg,png|max:2048',
            'stock'=>['required','max:50'],
            'category'=>['required','max:50'],
        ]);

        $data = $request->all();
        $product=Product::find($id);

        if ($request->file('image')){
            $image = $request->file('image');
            $extention = $image->getClientOriginalExtension();
            $image_name = time().'.'.$extention;
            $image->move('uploads/products_images',$image_name);
            $product->image_path = $image_name;
        }


        $product->product_name = $data['product_name'];
        $product->product_description = $data['product_description'];
        $product->purchase_price = $data['purchase_price'];
        $product->sale_price = $data['sale_price'];
        $product->stock = $data['stock'];

        $product->category_id = $data['category'];
        $product->save();

        return redirect('dashboard/products')->with('status','Product Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $product = Product::find($id);

        unlink("uploads/products_images/".$product->image_path);
        $product->delete();

        return redirect()->back()->with('status','Product Deleted Successfully');
    }

}
