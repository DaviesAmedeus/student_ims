<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    public function list()
    {
        $viewData['header_title'] = 'Parents List';
        $viewData['teachers'] = User::getTeachers();
        return view('admin.teacher.list', $viewData);
    }

    public function add()
    {
        $viewData['header_title'] = 'Add new Teacher';
        return view('admin.teacher.add', $viewData);
    }


    public function insert(Request $request)
    {
        $request->validate(
           [
            'email'=>['required', 'email', 'unique:users'],
            'mobile_number' => ['max:15', 'min:8',],
            'marital_status' => ['max:50',]
           ]);

        $teacher = new User;
        $teacher->name = trim($request->name);
        $teacher->middle_name = trim($request->middle_name);
        $teacher->last_name = trim($request->last_name);
        $teacher->email = trim($request->email);
        $teacher->email = trim($request->email);
        $teacher->gender = trim($request->gender);
        $teacher->marital_status = trim($request->marital_status);
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->status = trim($request->status);
        $teacher->address = trim($request->address);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->experience = trim($request->experience);
        $teacher->qualification = trim($request->qualification);
        $teacher->password = trim($request->password);

        if(!empty($request->joining_date)){
            $teacher->joining_date = trim($request->joining_date);
        }

        if(!empty($request->date_of_birth)){
            $teacher->date_of_birth = trim($request->date_of_birth);
        }


        if (!empty($request->file('profile_picture'))) {

            if(!empty($teacher->getProfilePicture())){
                unlink('upload/profile/'.$teacher->profile_picture);
            }
            $extension   = $request->file('profile_picture')->getClientOriginalExtension();
            $file        = $request->file('profile_picture');
            $randomStr   = date('Ymdhis') . Str::random(20);
            $filename    = strtolower($randomStr) . '.' . $extension;
            $file->move('upload/profile/', $filename);

            $teacher->profile_picture = $filename;
        }

        $teacher->user_type = 2;
        $teacher->save();

        return redirect('admin/teacher/list')->with('success', 'Teacher successfully created!');
    }

    public function edit($id)
    {
        $viewData['teacher']     = User::getSingleUser($id);
        $viewData['header_title']  = 'Edit Teacher';

        if (!empty($viewData['teacher'])) {
            return view('admin.teacher.edit', $viewData);
        } else {
            abort(404);
        }
    }

    public function update(Request $request, $id)
    {

        // --- Validation ---
        $request->validate(
            [
             'email'=>['required', 'email', 'unique:users,email,' . $id],
             'mobile_number' => ['max:15', 'min:8',],
             'marital_status' => ['max:50',]
            ]);


        $teacher                    = User::getSingleUser($id);
        $teacher->name = trim($request->name);
        $teacher->middle_name = trim($request->middle_name);
        $teacher->last_name = trim($request->last_name);
        $teacher->email = trim($request->email);
        $teacher->email = trim($request->email);
        $teacher->gender = trim($request->gender);
        $teacher->marital_status = trim($request->marital_status);
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->status = trim($request->status);
        $teacher->address = trim($request->address);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->experience = trim($request->experience);
        $teacher->qualification = trim($request->qualification);
        $teacher->password = trim($request->password);

        if(!empty($request->joining_date)){
            $teacher->joining_date = trim($request->joining_date);
        }

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

        return redirect('admin/teacher/list')->with('success', 'Teacher successflly  updated!');
    }


    public function delete($id)
    {

        $student = User::getSingleUser($id);
        $student->is_delete = 1;
        $student->save();
        return redirect()->back()->with('success', 'You have successfully deleted a Teacher');
    }
}
