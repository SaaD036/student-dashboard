<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

use App\Models\Course;
use App\Models\StudentTakeCourse;
use App\Models\Department;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }

        if(Auth::user()->is_authority){
            return redirect()->route('admin-home');
        }

        $totalCourse = StudentTakeCourse::where('student_id', Auth::user()->id)->count();
        $cgpa = StudentTakeCourse::where('student_id', Auth::user()->id)
                ->where('grade', '>', 0)
                ->avg('grade');

        $cgpa = round($cgpa, 3);

        $courses = Course::join('student_take_courses', 'courses.id', 'student_take_courses.course_id')
                    ->where('student_take_courses.student_id', Auth::user()->id)
                    ->orderBy('semestar')
                    ->get();

        // return $takenCourses;
        // return $totalCourse;
        // return $cgpa;
        return view('User.dashboard', compact('courses', 'totalCourse', 'cgpa'));
    }

    public function course(){
        if(Auth::check()){
            if(Auth::user()->is_authority){
                return redirect()->route('admin-home');
            }

            $courses = Course::select()
                        ->where('department', Auth::user()->department)
                        ->get();

            $tmpCourse = [];

            foreach($courses as $course){
                $course->is_taken = DB::table('student_take_courses')
                                    ->where('student_id', Auth::user()->id)
                                    ->where('course_id', $course->id)
                                    ->count();

                $tmpCourse[] = $course;
            }

            $course = $tmpCourse;

            return view('course', compact('courses'));
        }

        return redirect()->route('login');
    }

    public function takeCourse(Request $request, $courseID){
        if(Auth::check()){
            if(Auth::user()->is_authority){
                return redirect()->route('admin-home');
            }

            $isTaken = DB::table('student_take_courses')
                ->where('student_id', Auth::user()->id)
                ->where('course_id', $courseID)
                ->count();

            if($isTaken == 0){
                $course = new StudentTakeCourse;

                $course->student_id = Auth::user()->id;
                $course->course_id = $courseID;

                $course->save();
            }

            return redirect()->route('user-course');
        }

        return redirect()->route('login');
    }

    public function deletCourse(Request $request, $courseID){
        if(Auth::check()){
            if(Auth::user()->is_authority){
                return redirect()->route('admin-home');
            }

            StudentTakeCourse::where('student_id', Auth::user()->id)
                                ->where('course_id', $courseID)
                                ->delete();

            return redirect()->route('user-course');
        }

        return redirect()->route('login');
    }
}
