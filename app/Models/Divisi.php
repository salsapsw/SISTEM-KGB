<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $table = "divisi";
    protected $fillable = [
        'nama_divisi',
        'deskripsi'
    ];

    public function users(){
        return $this->hasMany(User::class,'divisi_id','id');
    }

}