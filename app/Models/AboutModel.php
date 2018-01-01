<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutModel extends Model
{
    protected $table = "about";
    protected $primaryKey = "id_about";
    protected $fillable = [
        'image','content','create_at','updated_at'
    ];
}
