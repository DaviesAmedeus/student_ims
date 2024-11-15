<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Subject extends Model
{
    protected $table = 'subjects'; //No reason because the table also is called subjects
    protected $fillable = [
        'name','type', 'status', 'created_by', 'is_delete',
    ];

    static public function getRecord(){

        $return = Subject::select('subjects.*', 'users.name as created_by_name')
            ->where('subjects.is_delete', '=', 0);

            if(!empty(Request::get('name'))){
                $return = $return->where('subjects.name', 'like', '%'.Request::get('name').'%');
            }

            if(!empty(Request::get('date'))){
                $return = $return->whereDate('subjects.created_at', '=', Request::get('date'));
            }

            if (Request::has('type')) {
                // Apply the filter only if a specific status is selected
                $type = Request::get('type');
                $return = $return->where('subjects.type', $type);
            }




            // if (Request::has('status')) {
            //     // Apply the filter only if a specific status is selected
            //     $status = Request::get('status');
            //     $return = $return->where('subjects.status', $status);
            // }


            $return = $return->join('users', 'users.id', 'subjects.created_by')
            ->orderBy('subjects.id', 'desc')
            ->paginate(20);

            return $return;

    }

    static public function getSingleSubject($id){

        return Subject::find($id);
}

static public function getSubjects(){
    $return = Subject::select('subjects.*')
    ->where('subjects.is_delete', '=', 0)
    ->where('subjects.status', '=', 1)
    ->join('users', 'users.id', 'subjects.created_by')
    ->orderBy('subjects.name', 'asc')
    ->get();

    return $return;
}

}
