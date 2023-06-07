<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreContentRequest;
use App\Http\Requests\UpdateContentRequest;
use App\Models\Content;
use App\Models\Slot;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Str;
use DB;
use Storage;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $contents = Content::latest()->paginate(8);
        $header = 'Contents';
        $product_owners = User::where('email', '!=', null)->whereNotIn('is_admin', array(True))->get();

        $context = array(
            'i'  =>  (request()->input('page', 1) - 1) * 5,
            'header' => $header,
            'product_owners' => $product_owners,
        );
        return view('content.index',compact('contents'))
                    ->with($context);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $header = 'Create Contents';
        $slots=Slot::all();
        $context = array(
            'user_id'  => Auth::id(),
            'slots' => $slots,
            'header' => $header,
        );
        return view('content.create')->with($context);
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
            'slot_id' => 'required',
        ]);

        $input = $request->all();
        $image_numbers = ['1', '2', '3', '4', '5', '6'];

        foreach ($image_numbers as $value) {
            if ($image = $request->file('image_'.$value)) {
                $destinationPath = 'images/content/';
                $contentImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $contentImage);
                $input['image_'.$value] = "$destinationPath$contentImage";
            }  
        }
        
        $input['slug'] = Str::slug($input['name']);

        Content::create($input);
       
        return redirect()->route('content.index')
                        ->with('success','Content created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content): View
    {       
        $slots=Slot::all();
        $slot=Slot::where('id',$content->slot_id)->first();
        $header = 'View Contents';
        $context = array(
            'slot' => $slot,
            'header' => $header,
        );
        return view('content.show',compact('content'))->with($context);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content): View
    {
        $product_owners = User::where('email', '!=', null)->whereNotIn('is_admin', array(True))->get();
        $context = array(
            'product_owners' => $product_owners,
        );
        return view('content.edit',compact('content'))->with($context);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Content $content): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
    
        $input = $request->all();
    

        $image_numbers = ['1', '2', '3', '4', '5', '6'];

        foreach ($image_numbers as $value) {
            if ($image = $request->file('image_'.$value)) {
                $destinationPath = 'images/content/';
                $contentImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $contentImage);
                $input['image_'.$value] = "$destinationPath$contentImage";
            }else{
                unset($input['image_'.$value]);
            } 
        }

        $content->update($input);
      
        return redirect()->route('content.index')
                        ->with('success','Content has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_image_content(Request $request): RedirectResponse
    {
        if ($request->has('image') and $request->has('content')){
            $content = Content::where('id', $request->get('content'))->first();
            $sql = 'select contents.image_'.strval($request->get('image')).' from contents where id = ' . strval($request->get('content'));
            $query = DB::table('contents')
                ->selectRaw('contents.image_'.strval($request->get('image')).' ')
                ->where('id', '=', strval($request->get('content')))
                ->get();
            $field_name = 'image_'.strval($request->get('image'));
            $image_url = $query->first()->$field_name; 
            Storage::disk('public')->delete(strval($image_url));
            $sql = 'update contents set image_'.strval($request->get('image')).' = "" where id = ' . strval($request->get('content'));
            DB::statement($sql);
        }
         
        return redirect()->route('content.index')
                        ->with('success','Image has been deleted successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content): RedirectResponse
    {
        $content->delete();
         
        return redirect()->route('content.index')
                        ->with('success','Content has been deleted successfully.');
    }
}