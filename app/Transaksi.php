<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //
    protected $table = 'transaksis';
    protected $fillable = [
        'alat_id',
        'tanggal_pinjam',
        'tanggal_rencana_kembali',
        'lama_hari',
        'tanggal_kembali',
        'total_biaya_sewa',
        'total_denda',
    ];
}
