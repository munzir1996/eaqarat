<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_id', 
        'name',
        'block',  
     ];

    public function estates()
    {
        return $this->hasMany(Estate::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function markets()
    {
        return $this->hasMany(Market::class);
    }
}
