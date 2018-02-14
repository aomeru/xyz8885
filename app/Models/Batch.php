<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

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

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
}
