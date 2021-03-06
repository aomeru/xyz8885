<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Purchase extends Model
{
    public function batches()
    {
        return $this->hasMany(Batch::class);
    }

    public function log()
    {
        return $this->hasMany(Plog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
