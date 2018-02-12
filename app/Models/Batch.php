<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
