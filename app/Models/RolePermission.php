<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected $fillable = [
        'permission_id','role_id'
    ];
    protected $table = 'role_permissions';
    public $timestamps = true;
}
