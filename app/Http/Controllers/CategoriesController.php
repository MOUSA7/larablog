<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\Console\Helper\Helper;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index(){
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    public function store(Request $request){

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::upper($request->name);
        $category->save();

        return view('admin.categories.bodyCategories',['categories'=> Category::all()]);

    }
    public function edit($id){
        $category = Category::findOrFail($id);
        return view('admin.categories.edit',compact('category'));
    }
    public function update(Request $request,$id){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = $request->name;
        $category->save();

        return view('admin.categories.bodyCategories')->with('categories',Category::get());
    }

    public function destroy($id){
        Category::destroy($id);
        return view('admin.categories.bodyCategories')->with('categories',Category::get());
    }

    public function show($slug){
        $category = Category::whereSlug($slug)->first();
        return view('admin.categories.show',compact('category'));
    }
    //
}
