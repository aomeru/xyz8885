<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class PasswordReset extends Model
{
    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'email');
    }
}
