<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name','show_name','description'
    ];
    protected $table = 'permissions';
    public $timestamps = true;

    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_permissions');
    }
}
