<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function change_password(){

        $viewData['header_title'] = "Change password";
        return view('profile.change_password', $viewData);
    }


    public function update_password(Request $request){

        // dd($request->all());
        $user = User::getSingleUser(Auth::user()->id);

        if(Hash::check($request->old_password, $user->password)){
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success', 'Password successfully updated!');


        } else{
            return redirect()->back()->with('error', 'The old password does not match');
        }
    }
}
