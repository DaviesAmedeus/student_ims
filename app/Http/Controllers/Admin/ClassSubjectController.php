<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subject;
use App\Models\ClassModel;
use App\Models\ClassSubject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClassSubjectController extends Controller
{
    public function list(Request $request){
        $viewData['header_title'] = 'Subject assign List';
        $viewData['getRecord'] = ClassSubject::getRecord();

        return view('admin.assign_subject.list', $viewData);

    }

    public function add(Request $request){
        $viewData['header_title'] = 'Assign class subject';

        $viewData['classes']= ClassModel::getClasses();
        $viewData['subjects']= Subject::getSubjects();
        return view('admin.assign_subject.add', $viewData);

    }


    public function insert(Request $request){

        // dd($request->all());
        if(!empty($request->subject_id)){

                foreach($request->subject_id as $subject_id){

                    $getAlreadyFirst = ClassSubject::getAlreadyFirst($request->class_id, $subject_id);
                    if(!empty($getAlreadyFirst)){

                        $getAlreadyFirst->status = $request->status;
                        $getAlreadyFirst->save();
                    }else{
                        $class_subject = new ClassSubject();
                        $class_subject->class_id = $request->class_id;
                        $class_subject->subject_id = $subject_id;
                        $class_subject->status = $request->status;
                        $class_subject->created_by = Auth::user()->id;
                        $class_subject->save();
                    }




                }

             return redirect('admin/assign_subject/list')->with('success', 'Subjected successfully asssigned to a Class!');

        }else{
            return redirect()->back()->with('error', 'Due to some Error pls try again!');
        }

    }


    public function edit($id){
        $classSubject = ClassSubject::getSingleClassSubject($id);

        if(!empty($classSubject)){
            $viewData['class_subject'] = $classSubject;
            $viewData['assigned_subjects']= ClassSubject::getAssignedSubjectID($classSubject->class_id);
            $viewData['header_title'] = 'Edit class subject';
            $viewData['classes']= ClassModel::getClasses();
            $viewData['subjects']= Subject::getSubjects();
            return view('admin.assign_subject.edit', $viewData);
        }else{
            abort(404);
        }



    }


    public function update(Request $request){
        ClassSubject::deleteSubject($request->class_id);

        if(!empty($request->subject_id)){

            foreach($request->subject_id as $subject_id){

                $getAlreadyFirst = ClassSubject::getAlreadyFirst($request->class_id, $subject_id);
                if(!empty($getAlreadyFirst)){

                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                }else{
                    $class_subject = new ClassSubject();
                    $class_subject->class_id = $request->class_id;
                    $class_subject->subject_id = $subject_id;
                    $class_subject->status = $request->status;
                    $class_subject->created_by = Auth::user()->id;
                    $class_subject->save();
                }


            }
    }
    return redirect('admin/assign_subject/list')->with('success', 'Class Subjects updated successfully!');

    }


    public function delete($id){
        $classSubject = ClassSubject::getSingleClassSubject($id);
        $classSubject->is_delete = 1;
        $classSubject->save();

        return redirect()->back()->with('success', 'Class subject deleted successfuly!');

    }
}
