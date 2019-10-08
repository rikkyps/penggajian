<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'name', 'tunjangan',
    ];

    public function Karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }
}
