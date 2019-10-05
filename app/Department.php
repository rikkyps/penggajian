<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'department_id', 'name',
    ];

    protected $primaryKey = 'department_id';
    public $incrementing = false;
}
