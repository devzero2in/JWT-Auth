<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSession extends Model
{
    protected $fillable = [
        'user_id',
        'session_token',
        'login_time',
        'logout_time',
        'ip_address',
        'user_agent',
        'extra_data'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
