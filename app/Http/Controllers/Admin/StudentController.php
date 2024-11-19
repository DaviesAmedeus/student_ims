<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\ClassModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function list()
    {
        $viewData['header_title'] = 'Student List';
        $viewData['students'] = User::getStudents();
        return view('admin.student.list', $viewData);
    }

    public function add()
    {
        $viewData['header_title'] = 'Add new Student';
        $viewData['classes'] = ClassModel::getClasses();
        return view('admin.student.add', $viewData);
    }

    public function insert(Request $request)
    {
        // --- Validation ---
        $request->validate([
            'name'         => ['required', 'min:3', 'max:20'],
            'middle_name'  => ['min:1', 'max:20',],
            'last_name'    => ['required', 'min:3', 'max:20'],
            'email'        => ['required', 'unique:users', 'email'],
            'height'       => ['max:200', 'numeric'],
            'weight'       => ['max:200', 'numeric'],
            'caste'        => ['max:50',],
            'religion'     => ['max:50',],
            'mobile_number' => ['max:15', 'min:8'],
            'blood_group'  => ['max:4',],
            'gender'       => ['required'],
            'password'     => ['required', 'min:6', 'max:12'],
        ]);

        $student = new User;
        $student->name             = trim($request->name);
        $student->middle_name      = trim($request->middle_name);
        $student->last_name        = trim($request->last_name);
        $student->email            = trim($request->email);
        $student->password         = trim(Hash::make($request->password));
        $student->class_id         = trim($request->class_id);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number       = trim($request->roll_number);
        $student->status            = trim($request->status);
        $student->gender            = trim($request->gender);
        $student->caste             = trim($request->caste);
        $student->religion          = trim($request->religion);
        $student->blood_group       = trim($request->blood_group);
        $student->height            = trim($request->height);
        $student->weight            = trim($request->weight);
        $student->mobile_number     = trim($request->mobile_number);

        if (!empty($request->admission_date)) {
            $student->admission_date = trim($request->admission_date);
        }

        if (!empty($request->date_of_birth)) {
            $student->date_of_birth  = trim($request->date_of_birth);
        }
        if (!empty($request->file('profile_picture'))) {
            $extension       = $request->file('profile_picture')->getClientOriginalExtension();
            $file            = $request->file('profile_picture');
            $randomStr       = date('Ymdhis') . Str::random(20);
            $filename        = strtolower($randomStr) . '.' . $extension;
            $file->move('upload/profile/', $filename);
            $student->profile_picture = $filename;
        }
        $student->user_type = 3;
        $student->save();

        return redirect('admin/student/list')->with('success', 'Student successflly  created!');
    }

    public function edit($id)
    {
        $viewData['student']     = User::getSingleUser($id);
        $viewData['classes'] = ClassModel::getClasses();
        $viewData['header_title']  = 'Edit Student';

        if (!empty($viewData['student'])) {
            return view('admin.student.edit', $viewData);
        } else {
            abort(404);
        }
    }

    public function update(Request $request, $id)
    {

        // dd($request->all());
        // --- Validation ---
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
        ]);

            $student                    = User::getSingleUser($id);
            $student->name              = trim($request->name);
            $student->middle_name       = trim($request->middle_name);
            $student->last_name         = trim($request->last_name);
            $student->email             = trim($request->email);
            $student->class_id          = trim($request->class_id);
            $student->admission_number  = trim($request->admission_number);
            $student->roll_number       = trim($request->roll_number);
            $student->status            = trim($request->status);
            $student->gender            = trim($request->gender);
            $student->caste             = trim($request->caste);
            $student->religion          = trim($request->religion);
            $student->blood_group       = trim($request->blood_group);
            $student->height            = trim($request->height);
            $student->weight            = trim($request->weight);
            $student->mobile_number     = trim($request->mobile_number);

        if (!empty($request->password)) {
            $request->validate(['password'     => ['min:6', 'max:12'],]);
            $student->password          = trim(Hash::make($request->password));
        }


        if (!empty($request->admission_date)) {

            $student->admission_date    = trim($request->admission_date);
        }

        if (!empty($request->date_of_birth)) {

        $student    ->date_of_birth     = trim($request->date_of_birth);
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

        return redirect('admin/student/list')->with('success', 'Student successflly  updated!');
    }

 public function delete($id){

    $student = User::getSingleUser($id);
    $student->is_delete = 1;
    $student->save();
    return redirect('admin/student/list')->with('success', 'You have successfully deleted a student');

 }
}
