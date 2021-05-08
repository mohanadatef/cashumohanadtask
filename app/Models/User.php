<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name','email','password','email_verified_at','user_id','website'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsToMany(Role::Class, 'user_roles');
    }

    public function user()
    {
        return $this->belongsTo(User::Class, 'user_id');
    }

    public function sale()
    {
        return $this->HasMany(Sale::Class);
    }

    public function config()
    {
        return $this->HasMany(Config::Class);
    }
}
