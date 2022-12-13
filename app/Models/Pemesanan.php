<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pengguna(){
        return $this->belongsTo(User::class, 'id_pengguna', 'id');
    }

    public function petugas(){
        return $this->belongsTo(User::class, 'id_petugas', 'id');
    }

    // public function bahan(){
    //     return $this->belongsTo(Bahan::class, 'id_bahan', 'id');
    // }
}
