<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'user_id','payment'
    ];
    protected $table = 'sales';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::Class, 'user_id');
    }
}
