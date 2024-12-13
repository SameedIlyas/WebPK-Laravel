<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // The attributes that are mass assignable
    protected $fillable = [
        'name',
        'username',
        'password',
    ];

    // The attributes that should be hidden for serialization
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // The attributes that should be cast
    protected $casts = [
        'password' => 'hashed',
    ];

    // Define the custom authentication column (username)
    public static function findForPassport($username)
    {
        return static::where('username', $username)->first();
    }
}
