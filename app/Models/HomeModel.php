<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeModel extends Model
{
    protected $table = 'home';
    protected $primaryKey = 'id_home';
    protected $fillable = [
        'judul','content','created_at','updated_at'
    ];
}
