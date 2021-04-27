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
        'counter',
        'called',
        'is_priority'
    ];

    use SoftDeletes;

    public function scopeIsNoShow($query, $value)
    {
        if ($value) {
            $value = $value == 'No Show' ? true : false;
            return $query->where('is_no_show', $value);
        }
    }

    public function scopeIsPriority($query, $value)
    {
        if ($value) {
            $value = $value == 'Priority' ? true : false;
            return $query->where('is_priority', $value);
        }
    }

    public function scopeByDepartment($query, $value)
    {
        if ($value) {
            return $query->where('department', $value);
        }
    }
}
