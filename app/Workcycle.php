<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workcycle extends Model
{
    protected $fillable = [
        'tanggal', 'keterangan',
    ];

    protected $dates = ['tanggal'];
}
