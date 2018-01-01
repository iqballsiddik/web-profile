<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    protected $table = 'contact';
    protected $primaryKey = 'id_contact';
    protected $fillable = [
        'neme','email','message','created_at','updated_at'
    ];
}
