<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    //
    protected $table = 'alats';
    protected $fillable = [
        'jenis_id',
        'tipe',
        'no_reg',
        'kapasitas',
        'no_polisi',
        'keterangan',
        'image',
        'harga_sewa_perhari',
        'created_by',
    ];
    
}
