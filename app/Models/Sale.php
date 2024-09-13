<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['dish_id', 'quantity'];

    // Relationship with Dish model
    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }

    
}
