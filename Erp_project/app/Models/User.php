<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function student()
    {
        return $this->hasOne(Student::class);
    }
    public function Teacher()
    {
        return $this->hasOne(Teacher::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::saved(function ($user) {
            $userId = $user->id;

            $student = $user->student()->create([
                'name' => $user->name,
                'email' => $user->email,
                'user_id' => $userId,
            ]);

        });
    }
}