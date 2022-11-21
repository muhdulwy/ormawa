<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    use HasFactory;
    protected $table = 'prestasi';
    protected $primaryKey = 'id';

    protected $fillable = [

        'nama',
        'image',
        'kegiatan_id',
        'organisasi_id'
    ];
}
