<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class ClassSubject extends Model
{
    protected $tables = 'class_subjects';


    static public function getRecord(){


        $return = self::select('class_subjects.*', 'classes.name as class_name', 'subjects.name as subject_name', 'users.name as created_by_name')
                        ->join('subjects', 'subjects.id', '=', 'class_subjects.subject_id')
                        ->join('classes', 'classes.id', '=', 'class_subjects.class_id')
                        ->join('users', 'users.id', '=', 'class_subjects.created_by');

        if(!empty(Request::get('class_name'))){
                $return = $return->where('classes.name', 'like', '%'.Request::get('class_name').'%');
            }

            if(!empty(Request::get('subject_name'))){
                $return = $return->where('subjects.name', 'like', '%'.Request::get('subject_name').'%');
            }

            if(!empty(Request::get('date'))){
                $return = $return->whereDate('class_subjects.created_at', '=', Request::get('date'));
            }

        $return = $return->where('class_subjects.is_delete',  0)
                         ->orderBy('class_subjects.id', 'desc')
                         ->paginate(20);

        return $return;
    }

    static public function getSingleClassSubject($id){
        return self::find($id);
    }

    static public function getAlreadyFirst($class_id, $subject_id){
        return self::where('class_id', $class_id)->where('subject_id', $subject_id)->first();
    }

   static public function getAssignedSubjectID($class_id){
         return self::where('class_id', $class_id)->where('is_delete', 0)->get();
    }

    static public function deleteSubject($class_id){
        return self::where('class_id', $class_id)->delete();
   }
}
