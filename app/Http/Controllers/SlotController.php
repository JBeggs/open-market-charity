<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Slot;
use Illuminate\Http\Request;
use App\Models\User;
use Str;

class SlotController extends Controller
{
    public function createSlot(Request $request)
    {
        $slots = Slot::where('name', null)->orderby('name', 'asc')->get();
        if($request->method()=='GET')
        {        
            $product_owners = User::where('email', '!=', null)->whereNotIn('is_admin', array(True))->get();
            $context = array(
                'product_owners' => $product_owners,
            );
            return view('content.create-slot', compact('slots'))->with($context);
        }
        if($request->method()=='POST')
        {
            $validator = $request->validate([
                'name'      => 'required',
                'slug'      => 'required|unique:slots',
            ]);

            Slot::create([
                'name' => $request->name,
                'slug' => Str::slug($request->slug),
                'user_id' => $request->user()->id,
            ]);

            return redirect('product')->with('success', 'Slot has been created successfully.');
        }
    }

    public function input($slug) 
    {
            $slots=Slot::all();
            $slot=Slot::where($slug=$this->slug)->first();
            $slot_id=$slot->id;
            $slot_name=$slot->name;
            $contents=Content::where('slot_id',$slot_id);  
            return view('slots', ['slots' => $slots, 'contents'=>$contents]); 
    }

    public function Slot() 
    {

        return $this->belongsTo('slot');
    
    }
    public $slug;
    public $slots;
}