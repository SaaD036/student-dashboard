<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function home(Request $request){
        if(Auth::check()){
            if(Auth::user()->is_authority){
                return view('admin.home');
            }
            return redirect()->route('home');
        }

        return redirect()->route('login');
    }
}
