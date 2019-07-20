<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $table = 'perusahaans';
    protected $fillable = [
        'nama_perusahaan',
        'no_telp',
        'email',
        'alamat',
        'user_id',
    ];
    
}
