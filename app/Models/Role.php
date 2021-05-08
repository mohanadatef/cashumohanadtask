<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
       'name'
    ];
    protected $table = 'roles';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsToMany(User::Class, 'user_roles');
    }

    public function permission()
    {
        return $this->belongsToMany(Permission::Class, 'role_permissions');
    }
}
