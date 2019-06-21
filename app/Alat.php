<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    //
    protected $table = 'alats';
    protected $fillable = [
        'jenis_peralatan',
        'tipe',
        'no_reg',
        'kapasitas',
        'no_polisi',
        'keterangan',
        'harga_sewa_perhari',
    ];
    
}
