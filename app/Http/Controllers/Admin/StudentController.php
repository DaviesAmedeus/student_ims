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
     $viewData['classes']= ClassModel::getClasses();
     return view('admin.student.add', $viewData);
     }

     public function insert(Request $request)
     {
        // --- Validation ---
         $request->validate([
             'name'=>['required',],
             'email'=>['required', 'unique:users'],]);

            //  dd($request->all());

         $user = new User;
         $user->name = trim($request->name);
         $user->middle_name = trim($request->middle_name);
         $user->last_name = trim($request->last_name);
         $user->email = trim($request->email);
         $user->password = trim(Hash::make($request->password) );
         $user->class_id = trim($request->class_id );
         $user->admission_number = trim($request->admission_number );

         if(!empty($request->admission_date)){
            $user->admission_date = trim($request->admission_date );
         }

         $user->roll_number = trim($request->roll_number );
         $user->status = trim($request->status );
         $user->gender = trim($request->gender );

         if(!empty($request->date_of_birth)){
            $user->date_of_birth = trim($request->date_of_birth );
         }

         $user->caste = trim($request->caste );
         $user->religion = trim($request->religion );
         $user->blood_group = trim($request->blood_group );
         $user->height = trim($request->height );
         $user->weight = trim($request->weight );

         if(!empty($request->file('profile_picture'))){
           $extension = $request->file('profile_picture')->getClientOriginalExtension();
           $file = $request->file('profile_picture');
           $randomStr = date('Ymdhis').Str::random(20);
           $filename = strtolower($randomStr).'.'.$extension;
           $file->move('upload/profile/', $filename);
           $user->profile_picture = $filename;
         }
         $user->user_type =3;
         $user->save();

         return redirect('admin/student/list')->with('success', 'Student successflly  created!');
      }

      public function edit($id)
    {

     $viewData['getRecord'] = User::getSingleUser($id);
     $viewData['header_title'] = 'Edit';

     if(!empty($viewData['getRecord']) ){
         return view('admin.admin.edit', $viewData);
     }else{
         abort(404);
     }

     }

     public function update(Request $request, $id)
    {
     $request->validate([
          'email'=>['required', 'unique:users,email,'.$id], //if the entred email is the one present for user with this $id it will skip
     ]);
     $user = User::getSingleUser($id);
     $user->name = trim($request->name);
     $user->email = trim($request->email);
     if(!empty($request->password)) {
         $user->password = trim(Hash::make($request->password) );
     }
     $user->save();

     return redirect('admin/admin/list')->with('success', 'Admin successflly  updated!');
     }

     public function delete($id)
     {
         $user = User::getSingleUser($id);
         $user->is_delete = 1;
         $user->save();
         return redirect('admin/admin/list')->with('success', 'Admin successflly  deleted!');


     }
}
