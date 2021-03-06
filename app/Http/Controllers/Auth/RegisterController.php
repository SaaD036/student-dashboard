<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Notifications\VerifyRegistration;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Department;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15'],
            'phone' => ['required', 'string', 'max:15'],
            'district_id' => ['required', 'numeric'],
            'street' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(Request $request)
    // {
    //     User::create([
    //         'first_name' => $request->f_name,
    //         'last_name' => $request->l_name,
    //         'phone' => $request->phone,
    //         'email' => $request->email,
    //         'image' => 'https://cdn.pixabay.com/photo/2018/08/28/12/41/avatar-3637425_960_720.png',
    //         'password' => Hash::make($request->password),
    //         'department' => $request->district_id,
    //         'ip_address' => request()->ip()
    //     ]);

    //     // $user->notify(new VerifyRegistration($user, $user->remember_token));
    //     // session()->flash('success', 'Confirmation mail has been sent to you');

    //     return redirect('/');
    // }

    public function showRegistrationForm()
    {
        $districts = Department::orderBy('name', 'asc')->get();
        return view('auth.register', compact('districts'));
    }
}
