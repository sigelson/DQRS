<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    protected $fillable = [
        'name',
        'snumber',
        'email',
        'department',
        'transaction',
        'remarks',
        'letter',
        'number',
        'called'
    ];
}
