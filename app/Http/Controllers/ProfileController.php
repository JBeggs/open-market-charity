<?php

namespace App\Http\Controllers;

use DB;
use Hash;
use Auth;
use Session;
use App\Models\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $product_owners = User::where('email', '!=', null)->whereNotIn('is_admin', array(True))->get();
        $context = array(
            'product_owners' => $product_owners,
        );
        return view('profile.profile')->with($context);
    }

    public function update(User $user, Request $request)
    {   
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => now()
        ]);

        return redirect('/product')->with('success', 'Profile Saved');
    }

    public function change_password(){
        return view('profile.change-password');
    }

    public function delete_profile(Request $request){

        $sql = 'update users set deleted_at = NOW() where id = ' . strval(Auth::id());
        DB::statement($sql);
        Session::flush();
        Auth::logout();

        return redirect('/');
    }

    public function change_password_post(Request $request){
        //dd($request);
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect('/product')->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
    
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
    
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
    
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
    
        return redirect('/product')->with("success","Password changed successfully !");
    
    }
}