<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'Teacher';

    protected $fillable = [
        'name',
        'email',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
