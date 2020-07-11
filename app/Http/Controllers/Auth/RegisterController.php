<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;
use Mail;
use App\Mail\VerifyEmail;
use Session;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    // public function register(Request $request)
    // {
    //     $this->validator($request->all())->validate();

    //     event(new Registered($user = $this->create($request->all())));

    //     $this->guard()->login($user);

    //     if ($this->guard()->user()->role == 'admin') {
    //         return redirect('admin/home');
    //     }
    //     elseif ($this->guard()->user()->role == 'user') {
    //         return redirect('user/home');
    //     }
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required','string','min:6','confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        Session::flash('status','Registered! but verify your email to activate your account');
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'verifyToken' => Str::random(40)
        ]);
        $thisUser = User::find($user->id);
        $this->sendEmail($thisUser);
        return $user;
    }
    public function sendEmail($thisUser){
        Mail::to($thisUser['email'])->send(new VerifyEmail($thisUser));
    }
    public function sendEmailDone($email, $verifyToken){
        $user = User::where(['email'=>$email, 'verifyToken'=>$verifyToken])->first();
        if ($user) {
            User::where(['email'=>$email, 'verifyToken'=>$verifyToken])->update(['status'=>1,'verifyToken'=>NULL]);
            if ($user->role == 'admin') {
                return redirect('admin/home');
            }
            elseif ($user->role == 'user') {
                return redirect('user/home');
            }
        }
        else{
            return view('email.errorUser');
        }
    }
    
}
