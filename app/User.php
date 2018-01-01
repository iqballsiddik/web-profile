<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Input;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public static function getUser($EmailUsername,$password){
        $query = 'select * from users where username = "'.$EmailUsername.'" or email = "'.$EmailUsername.'" and password = "'.$password.'"';
        
        $db = \DB::select($query);
        return $db;
    }


    public function role(){
        return $this->belongsTo(Role::class);
    }
}