<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $table = "profil";
    protected $fillable =[
    'NIP',
    'jenis_kelamin',
    'alamat',
    'no_hp',
    'foto_profil',
    'users_id'
    ];

    public function user(){
        return $this->belongsTo(User::class,'users_id');
    }
}
