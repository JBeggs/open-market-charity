<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Str;

class CategoryController extends Controller
{
    public function createCategory(Request $request)
    {
        $categories = Category::where('name', null)->orderby('name', 'asc')->get();
        if($request->method()=='GET')
        {
            $product_owners = User::where('email', '!=', null)->whereNotIn('is_admin', array(True))->get();
            $header = 'Create Category';
            $context = array(
                'header' => $header,
                'product_owners' => $product_owners,
            );
            return view('product.create-category', compact('categories'))->with($context);
        }
        if($request->method()=='POST')
        {
            $validator = $request->validate([
                'name'      => 'required',
                'slug'      => 'required|unique:categories',
            ]);

            Category::create([
                'name' => $request->name,
                'slug' => Str::slug($request->slug),
                'user_id' => $request->user()->id,
            ]);

            return redirect('product')->with('success', 'Category has been created successfully.');
        }
    }

    public function input($slug) 
    {
            $categories=Category::all();
            $category=Category::where($slug=$this->slug)->first();
            $category_id=$category->id;
            $category_name=$category->name;
            $products=Product::where('category_id',$category_id);  
            return view('categories', ['categories' => $categories, 'products'=>$products]); 
    }

    public function category() 
    {

        return $this->belongsTo('category');
    
    }
    public $slug;
    public $categories;
}