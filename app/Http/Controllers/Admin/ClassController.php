<?php

namespace App\Http\Controllers\Admin;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function list(){

        $viewData['header_title'] = 'Admin List';
        $viewData['getRecord'] = ClassModel::getRecord();

        return view('admin.class.list', $viewData);

    }

    public function add(){

        $viewData['header_title'] = 'Add Class';
        return view('admin.class.add', $viewData);

    }

    public function insert(Request $request){

        $class = $request->except('_token');
        $class['created_by'] = Auth::user()->id;


        ClassModel::create($class);

        return redirect('/admin/class/list')->with('success', 'New Class created successfull');

    }

    public function edit($id)
    {

     $viewData['getRecord'] = ClassModel::getSingleClass($id);
     $viewData['header_title'] = 'Edit';

     if(!empty($viewData['getRecord']) ){
         return view('admin.class.edit', $viewData);
     }else{
         abort(404);
     }

     }

     public function update(Request $request, $id)
    {

    //  $request->validate([
    //       'email'=>['required', 'unique:users,email,'.$id], //if the entred email is the one present for user with this $id it will skip
    //  ]);

     $class = ClassModel::getSingleClass($id);
     $class->name = $request->name;
     $class->status = $request->status;
     $class->save();

     return redirect('/admin/class/list')->with('success', 'Class updated successfull');
     }

     public function delete($id)
     {
        $delete = ClassModel::getSingleClass($id);
         $delete->is_delete = 1;
         $delete->save();
         return redirect('admin/class/list')->with('success', 'Class successfully  deleted!');


     }
}
