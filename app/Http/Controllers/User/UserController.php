<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Department;

class UserController extends Controller
{
    public function show(Request $request, $id){
        if(Auth::check()){
            if($id==Auth::user()->id || Auth::user()->is_authority){
                $user = User::where('id', $id)->first();
                $districts = Department::select()->get();
                $user_department = Department::select()
                                    ->where('id', Auth::user()->id)
                                    ->first();

                return view('User.home', compact('user', 'user_department', 'districts'));
            }
            else{
                return redirect('/user/'.Auth::user()->id);
            }
        }
        // return 'not logged in';
        else{
            session()->flash('errors', 'You are not logged in');
            return redirect()->route('home');
        }
    }

    public function update(Request $request, $id){
        if(Auth::check() && $id == Auth::user()->id){
            $user = User::where('id', $id)->first();

            if($request->email){
                $user->email = $request->email;
            }
            if($request->f_name){
                $user->first_name = $request->f_name;
            }
            if($request->l_name){
                $user->last_name = $request->l_name;
            }
            if($request->phone){
                $user->phone = $request->phone;
            }

            $user->save();
            session()->flash('success', 'User updated successfully');
            return redirect('/user/'.$id);
        }

        else{
            session()->flash('errors', 'You are not logged in');
            return redirect()->route('home');
        }
    }

    public function verifyUser(Request $request, $token_number){
        $user = User::where('remember_token', $token_number)->first();

        if(empty($user)){
            session()->flash('error', 'Your token is invalid');
        }

        $user->status = 1;
        $user->remember_token = NULL;
        $user->save();

        return redirect('home');
    }
}
