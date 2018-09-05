<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const ADMIN_TYPE = 1;
    const DEFAULT_TYPE = 0;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function requestbooks()
    {
        return $this->hasMany(Requestbook::class);
    }

    public function marks()
    {
        return $this->hasMany(Mark::class);
    }

    public function isAdmin()
    {
        return $this->is_admin === self::ADMIN_TYPE;
    }
}
