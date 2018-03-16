<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'code', 'ife', 'email', 'phone', 'cell', 'street', 'nex', 'nin', 'pc', 'col' ];
}