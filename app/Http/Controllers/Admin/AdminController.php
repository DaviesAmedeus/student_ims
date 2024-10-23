<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
   public function list()
   {
        $viewData['header_title'] = 'Admin List';
        $viewData['getRecord'] = User::getAdmin();
        return view('admin.admin.list', $viewData);
   }

   public function add()
   {
    $viewData['header_title'] = 'Add new Admin';
    return view('admin.admin.add', $viewData);
    }

    public function insert(Request $request)
    {
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = trim(Hash::make($request->password) );
        $user->user_type =1;
        $user->save();

        return redirect('admin/admin/list')->with('success', 'Admin successflly  created!');
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
