<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Content;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $contents = $request->user()->content;

        if ($contents->first() == null) {
            $contents = User::where('is_admin',True) -> first()->content;
        }

        $products = Product::latest()->paginate(20);
        $product_owners = User::where('email', '!=', null)->whereNotIn('is_admin', array(True))->get();
        $header = 'Products';
        $context = array(
            'i'  =>  (request()->input('page', 1) - 1) * 5,
            'header' => $header,
            'contents' => $contents,
            'product_owners' => $product_owners,
        );
        return view('home',compact('products'))->with($context);
    }

    public function welcome(Request $request)
    {
        $contents = $request->user()->content;
        if ($contents->first() == null) {
            $contents = User::where('is_admin',True) -> first()->content;
        }
        $products = Product::latest()->paginate(20);
        $product_owners = User::where('email', '!=', null)->whereNotIn('is_admin', array(True))->get();
        $header = 'Charities';
        $context = array(
            'i'  =>  (request()->input('page', 1) - 1) * 5,
            'header' => $header,
            'contents' => $contents,
            'product_owners' => $product_owners,
        );
        return view('welcome',compact('products'))->with($context);
    }
}
