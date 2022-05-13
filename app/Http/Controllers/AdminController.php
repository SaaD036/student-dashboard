<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Department;
use App\Models\Course;
use App\Models\User;
use App\Models\Counseling;
use DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function home(Request $request){
        if(Auth::check()){
            if(Auth::user()->is_authority){
                $countStudent = User::where('is_authority', 0)->count();
                $countTeacher = User::where('is_authority', 1)->count();
                $countDepartment = Department::count();

                return view('admin.dashboard', compact('countStudent', 'countTeacher', 'countDepartment'));
            }
            return redirect()->route('home');
        }

        return redirect()->route('login');
    }

    public function course(){
        if(Auth::check()){
            if(Auth::user()->is_authority){
                $departments = Department::select()->get();
                return view('admin.course', compact('departments'));
            }
            return redirect()->route('home');
        }

        return redirect()->route('login');
    }

    public function saveCourse(Request $request){
        if(Auth::check()){
            if(Auth::user()->is_authority){
                $course = new Course;

                $course->name = $request->name;
                $course->department = $request->district_id;
                $course->semestar = $request->semestar;

                $course->save();

                return redirect()->route('admin-course');
            }
            return redirect()->route('home');
        }

        return redirect()->route('login');
    }

    public function showCreateUser(){
        if(Auth::check()){
            if(Auth::user()->is_authority){
                $districts = Department::select()->get();
                return view('admin.createUser', compact('districts'));
            }
            return redirect()->route('home');
        }

        return redirect()->route('login');
    }

    public function createUser(Request $request){
        if(Auth::check()){
            if(Auth::user()->is_authority){
                $user = User::where('email', $request->email)
                            ->orWhere('phone', $request->phone)
                            ->get();

                if(count($user) > 0){
                    return redirect()->route('admin-create-user');
                }

                $newUser = new User;

                $newUser->first_name = $request->f_name;
                $newUser->last_name = $request->l_name;
                $newUser->phone = $request->phone;
                $newUser->image = "https://cdn.pixabay.com/photo/2018/08/28/12/41/avatar-3637425_960_720.png";
                $newUser->email = $request->email;
                $newUser->password = Hash::make($request->password);
                $newUser->department = $request->district_id;
                $newUser->ip_address = '127.0.0.1';

                $newUser->save();

                return redirect()->route('admin-create-user');
            }
            return redirect()->route('home');
        }

        return redirect()->route('login');
    }

    public function showPeople(Request $request){
        if(!Auth::check()){
            return redirect()->route('login');
        }

        if(!Auth::user()->is_authority){
            return redirect()->route('home');
        }

        $users = User::get();

        foreach($users as $user){
            $user->department = Department::where('id', $user->department)->first();
        }

        // return $users;

        return view('admin.people', compact('users'));
    }

    public function makeTeacher(Request $request, $id){
        if(!Auth::check()){
            return redirect()->route('login');
        }

        if(!Auth::user()->is_authority){
            return redirect()->route('home');
        }

        User::where('id', $id)->update(['is_authority' => true]);

        return redirect()->route('admin-people');
    }

    public function showResult(){
        if(!Auth::check()){
            return redirect()->route('login');
        }

        if(!Auth::user()->is_authority){
            return redirect()->route('home');
        }

        $users = User::join('student_take_courses', 'users.id', 'student_take_courses.student_id')
                    ->join('courses', 'courses.id', 'student_take_courses.course_id')
                    ->where('users.is_authority', false)
                    ->select('users.id as id', 'courses.id as course_id',
                            'users.first_name as first_name', 'users.last_name as last_name', 
                            'courses.name as course_name',
                            'courses.semestar as semestar',
                            'student_take_courses.grade as grade')
                    ->get();

        // return $users;
        return view('admin.result', compact('users'));
    }

    public function saveResult(Request $request, $user_id, $course_id){
        if(!Auth::check()){
            return redirect()->route('login');
        }

        if(!Auth::user()->is_authority){
            return redirect()->route('home');
        }

        $grade = $request->grade ? $request->grade : 0;

        DB::table('student_take_courses')
                    ->where('student_id', $user_id)
                    ->where('course_id', $course_id)
                    ->update(['grade' => $grade]);
        
        return redirect()->route('admin-result');  
    }

    public function showCounseling($user_id){
        if(!Auth::check()){
            return redirect()->route('login');
        }

        if(!Auth::user()->is_authority){
            return redirect()->route('home');
        }

        $counselings = Counseling::where('teacher_id', Auth::user()->id)
                        ->get();
        
        foreach($counselings as $counseling){
            if($counseling->student_id){
                $counseling->student_id = User::where('id', $counseling->student_id)->first();
            }
        }

        // return $counselings;

        return view('admin.counseling', compact('counselings'));
    }

    public function saveCounseling(Request $request, $user_id){
        if(!Auth::check()){
            return redirect()->route('login');
        }

        if(!Auth::user()->is_authority){
            return redirect()->route('home');
        }

        $counseling = new Counseling;

        $counseling->teacher_id = Auth::user()->id;
        $counseling->date = $request->date;
        $counseling->time = $request->time;
        $counseling->duartion = $request->duration;

        $counseling->save();

        return redirect()->route('admin-counseling', Auth::user()->id);
    }

    public function showFaculty(){
        if(!Auth::check()){
            return redirect()->route('login');
        }

        if(!Auth::user()->is_authority){
            return redirect()->route('home');
        }

        $users = User::where('is_authority', 1)->get();

        return view('admin.faculty', compact('users'));
    }

    public function showFacultyDetails($id){
        if(!Auth::check()){
            return redirect()->route('login');
        }

        if(!Auth::user()->is_authority){
            return redirect()->route('home');
        }

        $user = User::where('id', $id)->first();
        $user_department = Department::select()
                                    ->where('id', $user->department)
                                    ->first();
        $districts = Department::select()->get();

        return view('admin.faculty_profile', compact('user', 'user_department', 'districts'));
    }

    public function showTransport(){
        if(!Auth::check()){
            return redirect()->route('login');
        }

        if(!Auth::user()->is_authority){
            return redirect()->route('home');
        }

        

        return view('admin.transport');
    }
}
