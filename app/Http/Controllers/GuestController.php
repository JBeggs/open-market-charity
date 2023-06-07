<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Http\RedirectResponse;

class GuestController extends Controller
{
    public function login(): RedirectResponse
    {
        $randomNumbers = rand(pow(10, 5 - 1), pow(10, 5) - 1);
        $guest = User::create([
            'name' => "Guest{$randomNumbers}",
            'password' => "Guest{$randomNumbers}",
        ]);

        Auth::loginUsingId($guest->id);
        return redirect('/home');
    }
}