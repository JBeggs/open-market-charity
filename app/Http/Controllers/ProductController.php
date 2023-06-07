<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Storage;
use DB;
use Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
    
        if ($request->user()->is_admin) {
            $products = Product::where('id', '!=', 0)->orderby('name', 'asc')->paginate(50);
        }else{
            $products = Product::where('user_id', Auth::id())->orderby('name', 'asc')->paginate(20);
        }
        
        if ($request->has('product_owner')){
            $products = Product::where('user_id', $request->get('product_owner'))->orderby('name', 'asc')->paginate(20);
        }

        $contents = $request->user()->content;

        if ($contents->first() == null) {
            $contents = User::where('is_admin',True) -> first()->content;
        }

        $product_owners = User::where('email', '!=', null)->whereNotIn('is_admin', array(True))->get();
        $header = 'Products';
        $context = array(
            'i'  =>  (request()->input('page', 1) - 1) * 5,
            'header' => $header,
            'product_owners' => $product_owners,
            'contents' => $contents,
        );
        return view('product.index',compact('products'))
                    ->with($context);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $product_owners = User::where('email', '!=', null)->whereNotIn('is_admin', array(True))->get();
        $header = 'Create Products';
        $categories=Category::all();
        $contents = $request->user()->content;

        if ($contents->first() == null) {
            $contents = User::where('is_admin',True) -> first()->content;
        }
        $context = array(
            'user_id'  => Auth::id(),
            'categories' => $categories,
            'header' => $header,
            'product_owners' => $product_owners,
            'contents' => $contents
        );
        return view('product.create')->with($context);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image_1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=400,min_height=400',
            'category_id' => 'required',
        ]);
    
        $input = $request->all();

        $image_numbers = ['1', '2', '3', '4', '5', '6'];

        foreach ($image_numbers as $value) {
            if ($image = $request->file('image_'.$value)) {
                $destinationPath = 'images/product/';
                $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $productImage);
                $input['image_'.$value] = "$destinationPath$productImage";
            }  
        }
        
        $input['category_id'] = $input['category_id'];
        $input['slug'] = Str::slug($input['name']);

        Product::create($input);
       
        return redirect()->route('product.index')
                        ->with('success','Charity created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {       
        $categories=Category::all();
        $category=Category::where('id',$product->category_id)->first();
        $header = 'View Producies';
        $context = array(
            'category' => $category,
            'header' => $header,
        );
        return view('product.show',compact('product'))->with($context);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        $product_owners = User::where('email', '!=', null)->whereNotIn('is_admin', array(True))->get();
        $context = array(
            'product_owners' => $product_owners,
        );
        return view('product.edit',compact('product'))->with($context);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
    
        $input = $request->all();

        $image_numbers = ['1', '2', '3', '4', '5', '6'];

        foreach ($image_numbers as $value) {
            if ($image = $request->file('image_'.$value)) {
                $destinationPath = 'images/product/';
                $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $productImage);
                $input['image_'.$value] = "$destinationPath$productImage";
            }else{
                unset($input['image_'.$value]);
            } 
        }

        $product->update($input);

        return redirect()->route('product.index')
                        ->with('success','Charity has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_image(Request $request): RedirectResponse
    {
        if ($request->has('image') and $request->has('product')){
            $product = Product::where('id', $request->get('product'))->first();
            $sql = 'select products.image_'.strval($request->get('image')).' from products where id = ' . strval($request->get('product'));
            $query = DB::table('products')
                ->selectRaw('products.image_'.strval($request->get('image')).' ')
                ->where('id', '=', strval($request->get('product')))
                ->get();
            $field_name = 'image_'.strval($request->get('image'));
            $image_url = $query->first()->$field_name; 
            Storage::disk('public')->delete(strval($image_url));
            $sql = 'update products set image_'.strval($request->get('image')).' = "" where id = ' . strval($request->get('product'));
            DB::statement($sql);
        }
         
        return redirect()->route('product.index')
                        ->with('success','Charity has been deleted successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
         
        return redirect()->route('product.index')
                        ->with('success','Charity has been deleted successfully.');
    }
}