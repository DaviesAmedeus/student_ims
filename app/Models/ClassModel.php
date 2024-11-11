<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class ClassModel extends Model
{
    protected $table = 'classes';
    protected $fillable = [
        'name', 'status', 'created_by', 'is_delete',
    ];



    static public function getRecord(){

        $return = ClassModel::select('classes.*', 'users.name as created_by_name')
            ->where('classes.is_delete', '=', 0);

            if(!empty(Request::get('name'))){
                $return = $return->where('classes.name', 'like', '%'.Request::get('name').'%');
            }

            if(!empty(Request::get('date'))){
                $return = $return->whereDate('classes.created_at', '=', Request::get('date'));
            }
            $return = $return->join('users', 'users.id', 'classes.created_by')
            ->orderBy('classes.id', 'desc')
            ->paginate(10);

            return $return;

    }


    static public function getSingleClass($id){

            return ClassModel::find($id);
    }
}
