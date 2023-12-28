<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjagaan extends Model
{
    use HasFactory;

    protected $table = 'penjagaan';
    protected $fillable =
    [
        'nama',
        'pangkat',
        'golongan',
        'no_sk',
        'tgl_sk',
        'tmt_sk',
        'masa_kerja',
        'gaji',

    ];
}