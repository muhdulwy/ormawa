<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;
    protected $table = 'prestasi';
    protected $primaryKey = 'id';

    protected $fillable = [

        'nama',
        'kategori',
        'predikat',
        'tahun',
        'dokumentasi',
        'organisasi_id',
    ];

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }

}
