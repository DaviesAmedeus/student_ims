<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
                return redirect('admin/dashboard');

            }

        }
        else{
            return redirect()->back()->with('error', 'Please enter correct email and password');
        }
    }


    public function  logout(Request $request):RedirectResponse
    {
        // dd($request->all());
         Auth::logout();
         return redirect('/');
    }
}
