<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{

    protected $fillable = [
        'name', 
        'email',
        'address',
        'phone',
        'complain',
     ];

}
