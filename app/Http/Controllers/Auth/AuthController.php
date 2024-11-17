<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index(){

        if(!empty(Auth::check()))
        {
            if(Auth::user()->user_type == 1){
                return redirect('admin/dashboard');
            } elseif(Auth::user()->user_type == 2){
                return redirect('teacher/dashboard');
            }
            elseif(Auth::user()->user_type == 3){
                return redirect('student/dashboard');

            }elseif(Auth::user()->user_type == 4){
                return redirect('admin/dashboard');

            }
        }

        return view('auth.login');
    }


    public function login(Request $request):RedirectResponse
    {
        // dd($request->all());
           $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)){
            if(Auth::user()->user_type == 1){
                return redirect('admin/dashboard');
            } elseif(Auth::user()->user_type == 2){
                return redirect('teacher/dashboard');
            }
            elseif(Auth::user()->user_type == 3){
                return redirect('student/dashboard');

            }elseif(Auth::user()->user_type == 4){
                return redirect('parent/dashboard');

            }

        }
        else{
            return redirect()->back()->with('error', 'Please enter correct email and password');
        }
    }


    public function forgotPassword(){
        return view('auth.forgot');
    }

    public function  reset(Request $request)
    {
        $user = User::checkEmail($request->email);
        if(!empty($user)){
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)
                ->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('success', 'Please check your email and reset your password');

        }else{
            return redirect()->back()->with('error', 'Email address was not found!');
        }
    }


    public function  reseted($remember_token)
    {
        $user = User::getTokenSingle($remember_token);
        if(!empty($user)){
            $data['user'] = $user;
            return view('auth.reset', $data);
        }else{
            abort(404);
        }
    }

    public function postReset($token ,Request $request){
        if($request->password == $request->cpassword ){
            $user = User::getTokenSingle($token);
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();

            return redirect('/')->with('sucess', 'Password succesfully reseted');

        }else{
            return redirect()->back()->with('error', 'Fields do not match!');

        }

    }

    public function  logout(Request $request):RedirectResponse
    {
        // dd($request->all());
         Auth::logout();
         return redirect('/');
    }
}
