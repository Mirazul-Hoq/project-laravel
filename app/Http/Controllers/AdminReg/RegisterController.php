<?php

namespace App\Http\Controllers\AdminReg;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\User;
use App\Mail\VerifyAdminEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;
use Toastr;

class RegisterController extends Controller
{
    public function showAdminRegistrationForm(){
        Toastr::success('Verify your email to activate account', 'Registered!', ["positionClass" => "toast-top-center"]);
    	return view('admin.pages.admin_reg');
    }
    public function admin_register(Request $request){
    	$validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'string', 'max:255'],
            'password' => ['required','string','min:6','confirmed','regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/'],
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->verifyToken = Str::random(40);
        $adminemail = $user->email;
        $adminrole = $user->role;
        $adminverifyToken = $user->verifyToken;
        if ($user->save()) {
        	Mail::to($adminemail)->send(new VerifyAdminEmail($adminemail, $adminrole, $adminverifyToken));
        	return back()->with('status','Registered! but verify email to activate your account');
        }
    }
    public function sendAdminEmailDone($email, $verifyToken, $role){
        $user = User::where(['email'=>$email, 'verifyToken'=>$verifyToken])->first();
        if ($user) {
            User::where(['email'=>$email, 'verifyToken'=>$verifyToken])->update(['status'=>1,'verifyToken'=>NULL, 'role'=>$role]);
            if ($user->role == 'admin') {
                return redirect('admin/pages/index');
            }
            elseif ($user->role == 'user') {
                return redirect('user/pages/index');
            }
        }
        else{
            return view('email.errorUser');
        }
    }
}
