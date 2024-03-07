<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'Student';

    protected $fillable = [
        'name',
        'email',
        'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
