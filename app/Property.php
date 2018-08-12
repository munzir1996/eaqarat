<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'name', 
        'hire_date', 
        'age',
        'salary_pdf',
        'offical_pdf',
    ];
    
}
