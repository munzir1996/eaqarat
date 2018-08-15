<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'rate_id',
        'user_id',
        'estate_id',
        'comment', 
     ];

     public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function estate()
    {
        return $this->belongsTo(Estate::class);
    }

    public function rate()
    {
        return $this->belongsTo(Rate::class);
    }
}
