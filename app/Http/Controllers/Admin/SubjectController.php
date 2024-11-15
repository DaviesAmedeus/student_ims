<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Mockery\Matcher\Subset;

class SubjectController extends Controller
{
    public function list(){

        $viewData['header_title'] = 'Subject List';
        $viewData['getRecord'] = Subject::getRecord();

        return view('admin.subject.list', $viewData);

    }

    public function add(){

        $viewData['header_title'] = 'Class List';

        return view('admin.subject.add', $viewData);

    }

    public function insert(Request $request){

        $class = $request->except('_token');
        $class['created_by'] = Auth::user()->id;


        Subject::create($class);

        return redirect('/admin/subject/list')->with('success', 'New Subject created successfull');

    }


    public function edit($id)
    {

     $viewData['getRecord'] = Subject::getSingleSubject($id);
     $viewData['header_title'] = 'Edit';

     if(!empty($viewData['getRecord']) ){
         return view('admin.subject.edit', $viewData);
     }else{
         abort(404);
     }

     }

     public function update(Request $request, $id)
    {

    //  $request->validate([
    //       'email'=>['required', 'unique:users,email,'.$id], //if the entred email is the one present for user with this $id it will skip
    //  ]);

     $subject = Subject::getSingleSubject($id);
    $subject->update($request->except('_token'));
    return redirect('/admin/subject/list')->with('success', 'Subject updated successfull');
     }


     public function delete($id)
     {
        $delete = Subject::getSingleSubject($id);
         $delete->is_delete = 1;
         $delete->save();
         return redirect('admin/subject/list')->with('success', 'Subject successfully  deleted!');


     }
    }
