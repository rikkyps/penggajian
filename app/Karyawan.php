<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = [
        'nik', 'id_department', 'position_id',
        'name', 'born', 'address', 'since', 'status',
        'gender', 'photo', 'phone',
    ];

    protected $primaryKey = 'nik';
    public $incrementing = false;
    protected $dates = ['born', 'since'];

    public function Department()
    {
        return $this->belongsTo(Department::class);
    }

    public function Position()
    {
        return $this->belongsTo(Position::class);
    }
}
