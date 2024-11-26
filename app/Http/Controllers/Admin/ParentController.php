<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Parent\InsertParentFormRequest;

class ParentController extends Controller
{
    public function list()
    {
        $viewData['header_title'] = 'Parents List';
        $viewData['parents'] = User::getParents();
        return view('admin.parent.list', $viewData);
    }

    public function add()
    {
        $viewData['header_title'] = 'Add new Parent';
        $viewData['students'] = User::getStudents();
        return view('admin.parent.add', $viewData);
    }

    public function insert(Request $request)
    {
    $request->validate([
        'profile_picture'=> ['nullable'],
        'name'           => ['required', 'min:3', 'max:20'],
        'middle_name'    => ['nullable','min:1', 'max:20',],
        'last_name'      => ['required', 'min:3', 'max:20'],
        'email'          => ['required', 'unique:users', 'email'],
        'occupation'     => ['max:255'],
        'address'        => ['max:255'],
        'mobile_number'  => ['max:15', 'min:8'],
        'gender'         => ['required'],
        'status'         => ['required'],
        'password'       => ['required', 'min:6', 'max:12'],
    ]);

        $parent                    = new User;

        $parent->name              = trim($request->name);
        $parent->middle_name       = trim($request->middle_name);
        $parent->last_name         = trim($request->last_name);
        $parent->email             = trim($request->email);
        $parent->gender            = trim($request->gender);
        $parent->mobile_number     = trim($request->mobile_number);
        $parent->occupation        = trim($request->occupation);
        $parent->address           = trim($request->address);
        $parent->status            = trim($request->status);
        $parent->password          = trim(Hash::make($request->password));


        if ($request->file('profile_picture')) {
            $extension       = $request->file('profile_picture')->getClientOriginalExtension();
            $file            = $request->file('profile_picture');
            $randomStr       = date('Ymdhis') . Str::random(20);
            $filename        = strtolower($randomStr) . '.' . $extension;
            $file->move('upload/profile/', $filename);
            $parent->profile_picture = $filename;
        }

        $parent->user_type = 4;
        $parent->save();

        return redirect('admin/parent/list')->with('success', 'Parent successflly  created!');

    }

    public function edit($id)
    {
        $viewData['parent']     = User::getSingleUser($id);
        $viewData['header_title']  = 'Edit Parent';

        if (!empty($viewData['parent'])) {
            return view('admin.parent.edit', $viewData);
        } else {
            abort(404);
        }
    }

    public function update(Request $request, $id)
    {

        // dd($request->all());
        // --- Validation ---
        $request->validate([
            'profile_picture'=> ['nullable'],
            'name'           => ['required', 'min:3', 'max:20'],
            'last_name'      => ['required', 'min:3', 'max:20'],
            'email'          =>['required', 'unique:users,email,'.$id],
            'occupation'     => ['max:255'],
            'address'        => ['max:255'],
            'mobile_number'  => ['max:15', 'min:8'],
            'gender'         => ['required'],
            'status'         => ['required'],
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
            $parent->status            = trim($request->status);

        if (!empty($request->password)) {
            $request->validate(['password'     => ['min:6', 'max:12'],]);
            $parent->password          = trim(Hash::make($request->password));
        }



        if (!empty($request->file('profile_picture'))) {

            if(!empty($parent->getProfilePicture())){
                unlink('upload/profile/'.$parent->profile_picture);
            }
            $extension   = $request->file('profile_picture')->getClientOriginalExtension();
            $file        = $request->file('profile_picture');
            $randomStr   = date('Ymdhis') . Str::random(20);
            $filename    = strtolower($randomStr) . '.' . $extension;
            $file->move('upload/profile/', $filename);

            $parent->profile_picture = $filename;
        }

        $parent->save();

        return redirect('admin/parent/list')->with('success', 'Parent successflly  updated!');
    }

 public function delete($id){

    $student = User::getSingleUser($id);
    $student->is_delete = 1;
    $student->save();
    return redirect('admin/parent/list')->with('success', 'You have successfully deleted a student');

 }
}
