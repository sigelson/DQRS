<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Queue extends Model
{
    protected $fillable = [
        'name',
        'snumber',
        'email',
        'mobile',
        'department',
        'transaction',
        'remarks',
        'letter',
        'number',
        'called'
    ];

    use SoftDeletes;
}
