<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPemesanan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bahan(){
        return $this->belongsTo(Bahan::class, 'id_bahan', 'id');
    }
}
