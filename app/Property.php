<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    const ACCEPTED = '1';
    const NOTACCEPTED = '0';
    protected $fillable = [
        'name', 
        'hire_date', 
        'age',
        'salary_pdf',
        'offical_pdf',
        'property_type',
        'type',
    ];
    
}
