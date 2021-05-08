<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $fillable = [
        'user_id','role_id'
    ];
    protected $table = 'user_roles';
    public $timestamps = true;
}
