<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    protected $fillable = [
        'nik', 'tanggal_masuk', 'tanggal_pulang', 'kode_kehadiran',
    ];

    protected $dates = ['tanggal_masuk', 'tanggal_pulang'];
}
