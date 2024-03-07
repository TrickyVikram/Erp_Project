<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'Teacher';




    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
