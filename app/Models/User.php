<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    static public function getAdmin(){
        $return = self::select('users.*')
            ->where('user_type', '=', 1)
            ->where('is_delete', '=', 0);
            if(!empty(Request::get('name'))){
                $return = $return->where('name', 'like', '%'.Request::get('name').'%');
            }
            if(!empty(Request::get('email'))){
                $return = $return->where('email', 'like', '%'.Request::get('email').'%');
            }

            if(!empty(Request::get('date'))){
                $return = $return->whereDate('created_at', '=', Request::get('date'));
            }

        $return = $return->orderBy('id','desc')
                ->paginate(10);

        return $return;
    }

    static public function getStudents(){
        $return = self::select('users.*', 'classes.name as class_name')
        ->join('classes', 'classes.id', '=',  'users.class_id', 'left')
            ->where('users.user_type', '=', 3)
            ->where('users.is_delete', '=', 0);

            if(!empty(Request::get('name'))){
                $return = $return->where('users.name', 'like', '%'.Request::get('name').'%');
            }
            if(!empty(Request::get('email'))){
                $return = $return->where('users.email', 'like', '%'.Request::get('email').'%');
            }

            if(!empty(Request::get('admission_number'))){
                $return = $return->where('users.admission_number', 'like', '%'.Request::get('admission_number').'%');
            }

            if(!empty(Request::get('roll_number'))){
                $return = $return->where('users.roll_number', 'like', '%'.Request::get('roll_number').'%');
            }

            if(!empty(Request::get('class_name'))){
                $return = $return->where('classes.class_name', 'like', '%'.Request::get('class_name').'%');
            }

            if(!empty(Request::get('gender'))){
                $return = $return->where('users.gender', 'like', Request::get('gender'));
            }

            if(!empty(Request::get('date_of_birth'))){
                $return = $return->whereDate('date_of_birth', '=', Request::get('date_of_birth'));
            }

            if(!empty(Request::get('caste'))){
                $return = $return->where('users.caste', 'like', '%'.Request::get('caste').'%');
            }


            if(!empty(Request::get('religion'))){
                $return = $return->where('users.religion', 'like', '%'.Request::get('religion').'%');
            }

            if(!empty(Request::get('mobile_number'))){
                $return = $return->where('users.mobile_number', 'like', '%'.Request::get('mobile_number').'%');
            }



            if(!empty(Request::get('admission_date'))){
                $return = $return->whereDate('users.admission_date', '=', Request::get('admission_date'));
            }


            if(!empty(Request::get('blood_group'))){
                $return = $return->where('users.blood_group', 'like', '%'.Request::get('blood_group').'%');
            }

            if(!empty(Request::get('status'))){
                $return = $return->where('users.status', 'like', Request::get('status'));
            }


            if(!empty(Request::get('created_at'))){
                $return = $return->whereDate('users.created_at', 'like', Request::get('created_at'));
            }





        $return = $return->orderBy('id','desc')
                ->paginate(10);

      return $return;
    }

     public function getProfilePicture(){
        if(!empty($this->profile_picture) && file_exists('upload/profile/'.$this->profile_picture))
        {
            return url('upload/profile/'.$this->profile_picture);
        }else{
            return "";
        }
    }


    static public function getSingleUser($id){
        return self::find($id);
    }

    static public function checkEmail($email)
    {
       return User::where('email', '=', $email)->first();
    }

    static public function getTokenSingle($remember_token)
    {
        return User::where('remember_token', '=', $remember_token)->first();

    }
}
