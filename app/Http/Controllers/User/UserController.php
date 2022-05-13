<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Department;
use App\Models\Counseling;

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

        if(Auth::check() && Auth::user()->is_authority){
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
            return redirect()->route('admin-faculty');
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

    public function showFaculty(){
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $users = User::where('is_authority', 1)
                ->where('department', Auth::user()->department)
                ->get();

        return view('admin.faculty', compact('users'));
    }

    public function showFacultyDetails($id){
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $user = User::where('id', $id)->first();
        $user_department = Department::select()
                                    ->where('id', $user->department)
                                    ->first();
        $districts = Department::select()->get();
        $counselings = Counseling::where('teacher_id', $id)->get();

        return view('admin.faculty_profile', compact('user', 'user_department', 'districts', 'counselings'));
    }

    public function takeCounselling($id){
        if(!Auth::check()){
            return redirect()->route('login');
        }

        if(Auth::user()->is_authority){
            return redirect()->route('admin-home');
        }

        $counseling = Counseling::where('id', $id)->first();

        $counseling->student_id = Auth::user()->id;
        $counseling->save();

        return redirect()->route('user-faculty');
    }
}
