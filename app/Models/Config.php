<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = [
        'user_id','sales_target'
    ];
    protected $table = 'configs';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::Class, 'user_id');
    }
}
