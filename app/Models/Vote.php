<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
    'option',
    'device_id',
    'user_id',
    'suggestion',
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
