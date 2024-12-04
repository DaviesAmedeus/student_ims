<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function change_password(){

        $viewData['header_title'] = "Change password";
        return view('profile.change_password', $viewData);
    }


    public function myAccount(){

        $viewData['header_title'] = "My Account";
        $viewData['getRecord'] = User::getSingleUser(Auth::user()->id);

        if(Auth::user()->user_type == 1){
            return view('admin.my_account', $viewData);
        }
        else if(Auth::user()->user_type == 2){
            return view('teacher.my_account', $viewData);
        }
        else if(Auth::user()->user_type == 3){
            return view('student.my_account', $viewData);
        }
        else if(Auth::user()->user_type == 4){
            return view('parent.my_account', $viewData);
        }


    }

    public function updateMyAccountAdmin(Request $request){
        $id = Auth::user()->id;

        $request->validate(
            [
             'email'=>['required', 'email', 'unique:users,email,' . $id],

            ]);


        $admin = User::getSingleUser($id);
        $admin->name = trim($request->name);
        $admin->save();
        return redirect()->back()->with('success', 'You\'ve successfully updated your information!');

    }

    public function updateMyAccountTeacher(Request $request){
        $id = Auth::user()->id;

        $request->validate(
            [
             'email'=>['required', 'email', 'unique:users,email,' . $id],
             'mobile_number' => ['max:15', 'min:8',],
             'marital_status' => ['max:50',],
             'profile_picture' => ['mimes:jpeg,png,jpg,webp']

            ]);


        $teacher                    = User::getSingleUser($id);
        $teacher->name = trim($request->name);
        $teacher->middle_name = trim($request->middle_name);
        $teacher->last_name = trim($request->last_name);
        $teacher->email = trim($request->email);
        $teacher->gender = trim($request->gender);
        $teacher->marital_status = trim($request->marital_status);
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->address = trim($request->address);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->experience = trim($request->experience);
        $teacher->qualification = trim($request->qualification);


        if(!empty($request->date_of_birth)){
            $teacher->date_of_birth = trim($request->date_of_birth);
        }



        if (!empty($request->file('profile_picture'))) {

            if (!empty($teacher->getProfilePicture())) {
                unlink('upload/profile/' . $teacher->profile_picture);
            }
            $extension   = $request->file('profile_picture')->getClientOriginalExtension();
            $file        = $request->file('profile_picture');
            $randomStr   = date('Ymdhis') . Str::random(20);
            $filename    = strtolower($randomStr) . '.' . $extension;
            $file->move('upload/profile/', $filename);

            $teacher->profile_picture = $filename;
        }

        $teacher->save();

        return redirect()->back()->with('success', 'You\'ve successfully updated your information!');

    }


    public function updateMyAccountStudent(Request $request){
        $id = Auth::user()->id;

        $request->validate([
            'name'         => ['required', 'min:3', 'max:20'],
            'middle_name'  => ['min:1', 'max:20',],
            'last_name'    => ['required', 'min:3', 'max:20'],
            'email'=>['required', 'unique:users,email,'.$id], //if the entred email is the one present for user with this $id it will skip
            'height'       => ['max:200', 'numeric'],
            'weight'       => ['max:200', 'numeric'],
            'caste'        => ['max:50',],
            'religion'     => ['max:50',],
            'mobile_number' => ['max:15', 'min:8'],
            'blood_group'  => ['max:4',],
            'gender'       => ['required'],
            'profile_picture' => ['mimes:jpeg,png,jpg,webp']
        ]);


        $student                    = User::getSingleUser($id);
        $student->name              = trim($request->name);
        $student->middle_name       = trim($request->middle_name);
        $student->last_name         = trim($request->last_name);
        $student->email             = trim($request->email);
        $student->gender            = trim($request->gender);
        $student->caste             = trim($request->caste);
        $student->religion          = trim($request->religion);
        $student->blood_group       = trim($request->blood_group);
        $student->height            = trim($request->height);
        $student->weight            = trim($request->weight);
        $student->mobile_number     = trim($request->mobile_number);

        if (!empty($request->date_of_birth)) {

        $student->date_of_birth     = trim($request->date_of_birth);
        }

        if (!empty($request->file('profile_picture'))) {

            if(!empty($student->getProfilePicture())){
                unlink('upload/profile/'.$student->profile_picture);
            }
            $extension   = $request->file('profile_picture')->getClientOriginalExtension();
            $file        = $request->file('profile_picture');
            $randomStr   = date('Ymdhis') . Str::random(20);
            $filename    = strtolower($randomStr) . '.' . $extension;
            $file->move('upload/profile/', $filename);

            $student->profile_picture = $filename;
        }

        $student->save();

        return redirect()->back()->with('success', 'You\'ve successfully updated your information!');
    }

    public function updateMyAccountParent(Request $request){
        $id = Auth::user()->id;
        $request->validate([
            'profile_picture' => ['nullable'],
            'name'           => ['required', 'min:3', 'max:20'],
            'last_name'      => ['required', 'min:3', 'max:20'],
            'email'          => ['required', 'unique:users,email,' . $id],
            'occupation'     => ['max:255'],
            'address'        => ['max:255'],
            'mobile_number'  => ['max:15', 'min:8'],
            'gender'         => ['required'],
            'profile_picture' => ['mimes:jpeg,png,jpg,webp']

        ]);

        $parent                    = User::getSingleUser($id);
        $parent->name              = trim($request->name);
        $parent->middle_name       = trim($request->middle_name);
        $parent->last_name         = trim($request->last_name);
        $parent->email             = trim($request->email);
        $parent->gender            = trim($request->gender);
        $parent->mobile_number     = trim($request->mobile_number);
        $parent->occupation        = trim($request->occupation);
        $parent->address           = trim($request->address);


        if (!empty($request->file('profile_picture'))) {

            if (!empty($parent->getProfilePicture())) {
                unlink('upload/profile/' . $parent->profile_picture);
            }
            $extension   = $request->file('profile_picture')->getClientOriginalExtension();
            $file        = $request->file('profile_picture');
            $randomStr   = date('Ymdhis') . Str::random(20);
            $filename    = strtolower($randomStr) . '.' . $extension;
            $file->move('upload/profile/', $filename);

            $parent->profile_picture = $filename;
        }

        $parent->save();
        return redirect()->back()->with('success', 'You\'ve successfully updated your information!');


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
