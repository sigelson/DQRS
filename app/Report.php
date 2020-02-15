<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    protected $fillable = [
        'name',
        'snumber',
        'email',
        'mobile',
        'department',
        'transaction',
        'letter',
        'number',
        'remarks',

    ];

    use SoftDeletes;
}
