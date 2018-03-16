<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['picture', 'code', 'barcode', 'name', 'description', 'quantity', 'price', 'status', 'category', 'ubication'];

    public function scopeName($query, $name){
    	$query->where('code', $name);
    }
}
