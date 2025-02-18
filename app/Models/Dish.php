<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'description', 'quantity'];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
