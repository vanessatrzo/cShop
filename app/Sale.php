<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['code', 'name', 'quantity', 'price', 'total'];

    
}
