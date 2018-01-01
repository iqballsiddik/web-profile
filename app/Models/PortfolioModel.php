<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class PortfolioModel extends Model
{
    protected $table = 'portfolio';
    protected $primaryKey = 'id_portfolio';
    protected $fillable = [
        'image','name','content'
    ];
}
