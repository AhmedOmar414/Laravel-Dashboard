<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class CategoryController extends Controller
{

    public function index()
    {
        //return the number of related products
        $categories = Category::all();
        return view('dashboard.categories.index',compact('categories'));
    }

    public function search(Request $request){
        $query = $request->get('query');
        $categories = Search::add(Category::class,'category_name')->get($query);
        return view('dashboard.categories.index',compact(['categories','query']));
    }


    public function create()
    {
        return view('dashboard.categories.create');
    }


    public function store(Request $request)
    {
        $name = $request->category_name;
        $request->validate([
            'category_name'=>['required','max:50','unique:categories'],
        ]);
        Category::create(['category_name'=>$name]);
        return redirect('dashboard/categories')->with('status','Category Added Successfully');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = DB::table('categories')->where('id',$id)->first();
        return view('dashboard.categories.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name'=>['required','max:50','unique:categories'],
        ]);

        $data = $request->all();
        Category::where('id',$id)->update([
            'category_name'=>$data['category_name'],
        ]);

        return redirect('dashboard/categories')->with('status','updated successfully');
    }


    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->back()->with('status','Category Deleted Successfully');
    }
}
