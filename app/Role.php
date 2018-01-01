<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    // table roles berhubungan dengan user
    public function user(){
        return $this->hasMany(User::class);
    }
}
